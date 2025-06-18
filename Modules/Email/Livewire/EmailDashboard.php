<?php

namespace Modules\Email\Livewire;

use Str;
use Livewire\Component;
use Webklex\IMAP\Facades\Client;
use Illuminate\Support\Facades\Storage;

class EmailDashboard extends Component
{
    public $title = 'Email Dashboard';
    public $paginator, $folders = [], $selectedFolder = '[Gmail]/All Mail', $currentPage, $isLoading = '', $emails = [], $totalEmails = 0,  $modal, $singleEmail;
    public $paginationMeta = [
        'current_page' => 1,
        'last_page' => 1,
        'total' => 0,
        'has_more_pages' => false,
    ];

    public $page = 1;
    public $perPage = 10;
    public $totalMessages = 0;
    public $hasMorePages = false;
    public $lastPage = 1;


    public function mount()
    {
        $this->loadFolders();
        $this->loadEmails();
    }

    public function loadFolders()
    {
        try {
            $client = Client::account('gmail');
            $client->connect();

            $this->folders = [
                ['name' => 'All Mail', 'count' => 0, 'icon' => 'ri-inbox-line'],
                ['name' => 'Starred', 'count' => 0, 'icon' => 'ri-star-line'],
                ['name' => 'Drafts', 'count' => 0, 'icon' => 'ri-file-list-2-line'],
                ['name' => 'Sent Mail', 'count' => 0, 'icon' => 'ri-mail-line'],
                ['name' => 'Trash', 'count' => 0, 'icon' => 'ri-delete-bin-line'],
            ];

            $folders = $client->getFolders();

            foreach ($folders as $folder) {
                $folderName = $folder->name;
                $messageCount = $folder->messages()->count();

                foreach ($this->folders as &$f) {
                    if (
                        strtolower($f['name']) === strtolower($folderName) ||
                        strpos(strtolower($folderName), strtolower($f['name'])) !== false
                    ) {
                        $f['count'] = $messageCount;
                        break;
                    }
                }
            }
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to load folders: ' . $e->getMessage());
        }
    }

    public function nextPage()
    {
        if ($this->hasMorePages) {
            $this->page++;
            $this->loadEmails();
        }
    }

    public function previousPage()
    {
        if ($this->page > 1) {
            $this->page--;
            $this->loadEmails();
        }
    }

    public function gotoPage($page)
    {
        if ($page >= 1 && $page <= $this->lastPage) {
            $this->page = $page;
            $this->loadEmails();
        }
    }

    public function selectFolder($folderName)
    {

        $this->isLoading = 'on';
        $this->selectedFolder  = $folderName;
        $this->currentPage = 1;
        $this->loadEmails();
    }

    public function loadEmails()
    {
        $this->isLoading = 'on';
        $this->modal = '';

        try {
            $client = Client::account('gmail');
            $client->connect();
            $folder = $client->getFolder($this->selectedFolder);

            $messages = $folder->messages()->all()->setFetchOrder("desc")->paginate($per_page = $this->perPage, $this->page, 'imap_page');
            $emailsArray = [];

            foreach ($messages as $email) {
                $dateAttr = $email->getDate();
                $carbonDate = optional($dateAttr)->get();
                $rawBody = $email->getHTMLBody() ?: $email->getTextBody() ?: 'No Content';

                // Remove <style> and <script> tags with content
                $cleanedBody = preg_replace('/<(script|style)[^>]*>.*?<\/\1>/si', '', $rawBody);

                // Remove other tags & clean text
                $plainText = strip_tags($cleanedBody);
                $compactText = preg_replace('/\s+/', ' ', $plainText);
                $attachments = [];

                $emailsArray[] = [
                    'uid' => $email->getUid(), // Add unique identifier
                    'from' => $email->getFrom()[0]->mail ?? 'Unknown Sender',
                    'from_name' => $email->getFrom()[0]->personal ?? ($email->getFrom()[0]->mail ?? 'Unknown'),
                    'to' => $email->getTo()[0]->mail ?? 'Unknown Receiver',
                    'to_name' => $email->getTo()[0]->personal ?? ($email->getTo()[0]->mail ?? 'Unknown'),
                    'subject' => mb_decode_mimeheader($email->getSubject() ?? 'No Subject'),
                    'body' => Str::limit(trim($compactText), 100),
                    'date' => $carbonDate
                        ? ($carbonDate->isToday() ? $carbonDate->format('h:i A') : $carbonDate->format('M d'))
                        : 'Unknown Date',
                    'raw_date' => $carbonDate,
                    'is_seen' => $email->hasFlag('Seen'),
                    'is_flagged' => $email->hasFlag('Flagged'),
                ];
            }
            $this->totalMessages = $messages->total();
            $this->hasMorePages = $messages->hasMorePages();
            $this->lastPage = $messages->lastPage();
            $this->emails = $emailsArray;
        } catch (\Exception $e) {
            dd($e->getMessage());
            session()->flash('error', 'Failed to load emails: ' . $e->getMessage());
            $this->emails = [];
        }
        $this->singleEmail = null;
        $this->modal = '';
        $this->isLoading = '';
    }

    public function showMail($uid)
    {
        $client = Client::account('gmail');
        $client->connect();

        $folder = $client->getFolder($this->selectedFolder);
        $messages = $folder->search()->uid($uid)->get();
        if ($messages->isEmpty()) {
            $this->singleEmail = null;
            $this->modal = '';
            return;
        }

        $message = $messages->first();
        $dateAttr = $message->getDate();
        $carbonDate = optional($dateAttr)->get();

        // Safe email body handling
        $htmlBody = $message->getHTMLBody();
        $textBody = $message->getTextBody();

        // Sanitize HTML content to prevent XSS
        $body = $htmlBody ? $this->sanitizeEmailHtml($htmlBody) : ($textBody ? $textBody : 'No Content');



        foreach ($message->getAttachments() as $attachment) {
            $attachments[] = [
                'name' => $attachment->getName(),
                'size' => $attachment->getSize(),
                'type' => $attachment->getMimeType(),
                'content' => base64_encode($attachment->getContent()), // or just $attachment->getContent()
            ];
        }
        $singleEmail = [
            'uid' => $message->getUid(),
            'from' => $message->getFrom()[0]->mail ?? 'Unknown Sender',
            'from_name' => $message->getFrom()[0]->personal ?? ($message->getFrom()[0]->mail ?? 'Unknown'),
            'to' => $message->getTo()[0]->mail ?? 'Unknown Receiver',
            'reply_to' => $message->getReplyTo()->mail ?? 'Unknown Reply-To',
            'subject' => mb_decode_mimeheader($message->getSubject() ?? 'No Subject'),
            'body' => $body,
            'raw_body' => $htmlBody ?: $textBody,
            'has_html' => !empty($htmlBody),
            'attachments' => $attachments ?? [],
            'date' => $carbonDate ? $carbonDate->format('M d Y h:i A') : 'Unknown Date',
            'profile_image' => $message->getFrom()[0]->mail
                ? 'https://www.gravatar.com/avatar/' . md5(strtolower(trim($message->getFrom()[0]->mail))) . '?d=identicon'
                : '',
        ];

        $this->dispatch('loadHtmlInIframe', html: $singleEmail['body']); // ✅ correct syntax
        $this->singleEmail = $singleEmail;
        $this->modal = 'show';
    }

    private function sanitizeEmailHtml($html)
    {
        // Basic HTML sanitization - you might want to use a library like HTMLPurifier
        $html = preg_replace('/<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/mi', '', $html);
        $html = preg_replace('/<iframe\b[^<]*(?:(?!<\/iframe>)<[^<]*)*<\/iframe>/mi', '', $html);
        $html = preg_replace('/on\w+\s*=\s*["\'][^"\']*["\']/i', '', $html);
        $html = preg_replace('/javascript:/i', '', $html);

        return $html;
    }


    public function downloadAttachment($attachmentName)
    {
        foreach ($this->singleEmail['attachments'] as $attachment) {
            if ($attachment['name'] === $attachmentName) {
                // Step 1: Generate temporary unique path
                $tempFilename = uniqid() . '_' . $attachment['name'];
                $path = 'emails/' . $tempFilename;

                // Step 2: Store content temporarily
                Storage::disk('public')->put($path, base64_decode($attachment['content']));

                // Step 3: Download and delete after response finishes
                return response()->download(
                    Storage::disk('public')->path($path),
                    $attachment['name'],
                    [
                        'Content-Type' => $attachment['type'],
                    ]
                )->deleteFileAfterSend(true); // ✅ deletes the file after sending
            }
        }

        abort(404, 'Attachment not found.');
    }

    public array $selectedEmails = [];

    public function deletecheckEmails()
    {
        if (empty($this->selectedEmails)) {
            session()->flash('error', 'No emails selected for deletion.');
            return;
        }

        $client = Client::account('gmail');
        $folder = $client->getFolder($this->selectedFolder);
        $trash = $client->getFolder('[Gmail]/Trash');

        foreach ($this->selectedEmails as $uid) {
            $messages = $folder->query()->uid($uid)->get();

            if (!$messages->isEmpty()) {
                $message = $messages->first();
                // Pass the folder path as string, not the Folder object
                $message->move($trash->path);
            }
        }

        $this->modal = '';
        $this->singleEmail = null;

        $this->currentPage = 1;
        $this->loadEmails();
    }






    public function render()
    {

        return view('email::livewire.email-dashboard', ['title' => $this->title])->layout('components.layouts.app', ['title' => $this->title]);
    }
}
