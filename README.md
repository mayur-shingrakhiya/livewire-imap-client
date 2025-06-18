# 📧 Laravel Email Dashboard

A modern, responsive email management system built with Laravel Livewire and Gmail IMAP integration. This dashboard provides a complete email client interface within your Laravel application.

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![Livewire](https://img.shields.io/badge/Livewire-4E56A6?style=for-the-badge&logo=livewire&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)

## ✨ Features

- 🗂️ **Folder Management** - Browse Gmail folders (Inbox, Sent, Drafts, Trash, Starred)
- 📋 **Email Listing** - Paginated email display with real-time loading
- 👁️ **Email Viewer** - Full email content display with HTML support
- 📎 **Attachment Handling** - Download email attachments securely
- ✅ **Bulk Operations** - Select and delete multiple emails
- 🔄 **Real-time Updates** - Livewire-powered reactive interface
- 📱 **Responsive Design** - Works on desktop and mobile devices
- 🎨 **Modern UI** - Clean, intuitive interface with Bootstrap styling

## 🚀 Installation

### Prerequisites

- PHP 8.0 or higher
- Laravel 11 or higher
- Composer
- Gmail account with IMAP enabled

### Step 1: Install Dependencies

```bash
composer require webklex/laravel-imap
```

### Step 2: Publish Configuration

```bash
php artisan vendor:publish --provider="Webklex\IMAP\Providers\LaravelServiceProvider"
```

### Step 3: Configure Gmail IMAP

Add your Gmail IMAP configuration to `config/imap.php`:

```php
'accounts' => [
    'gmail' => [
        'host' => 'imap.gmail.com',
        'port' => 993,
        'encryption' => 'ssl',
        'validate_cert' => true,
        'username' => 'your-email@gmail.com',
        'password' => 'your-app-password', // Use App Password, not regular password
        'protocol' => 'imap',
    ],
],
```

### Step 4: Setup Gmail App Password

1. Enable 2-Step Verification on your Google Account
2. Generate an App Password:
   - Go to Google Account settings
   - Security → 2-Step Verification → App passwords
   - Generate password for "Mail"
   - Use this password in your configuration

### Step 5: Install the Module

Copy the provided files to your Laravel application:

```
Modules/Email/
├── Livewire/
│   └── EmailDashboard.php
└── Resources/
    └── views/
        └── livewire/
            └── email-dashboard.blade.php
```

### Step 6: Add Routes

Add to your `web.php`:

```php
Route::get('/email-dashboard', \Modules\Email\Livewire\EmailDashboard::class)->name('email.dashboard');
```

## 🎯 Usage

### Basic Usage

Navigate to `/email-dashboard` in your browser to access the email interface.

### Customization

#### Change Default Folder

```php
public $selectedFolder = '[Gmail]/Inbox'; // Change default folder
```

#### Modify Pagination

```php
public $perPage = 20; // Change emails per page
```

#### Custom Folder Icons

Update the `$folders` array in `loadFolders()` method:

```php
$this->folders = [
    ['name' => 'Inbox', 'count' => 0, 'icon' => 'ri-inbox-line'],
    ['name' => 'Sent Mail', 'count' => 0, 'icon' => 'ri-send-plane-line'],
    // Add more folders...
];
```

## 🔧 Configuration

### Environment Variables

Add to your `.env` file:

```env
IMAP_HOST=imap.gmail.com
IMAP_PORT=993
IMAP_ENCRYPTION=ssl
IMAP_USERNAME=your-email@gmail.com
IMAP_PASSWORD=your-app-password
```

### Security Settings

The dashboard includes built-in HTML sanitization for email content:

- Removes `<script>` and `<iframe>` tags
- Strips JavaScript event handlers
- Filters dangerous protocols

## 📊 File Structure

```
Modules/Email/
├── Livewire/
│   └── EmailDashboard.php          # Main Livewire component
└── Resources/
    └── views/
        └── livewire/
            └── email-dashboard.blade.php  # Dashboard template
```

## 🎨 UI Components

The dashboard uses modern UI components:

- **Responsive Grid Layout**
- **Loading States** with wire:loading
- **Modal Email Viewer**
- **Pagination Controls**
- **Bulk Selection Checkboxes**
- **Storage Usage Indicator**
- **Folder Navigation Sidebar**

## 🔐 Security Features

- ✅ HTML sanitization for email content
- ✅ XSS protection
- ✅ Secure attachment downloads
- ✅ Temporary file cleanup
- ✅ CSRF protection via Livewire

## 🐛 Troubleshooting

### Common Issues

#### "Authentication Failed"
- Ensure you're using an App Password, not your regular Gmail password
- Check that IMAP is enabled in Gmail settings

#### "Connection Timeout"
- Verify firewall settings allow outbound connections on port 993
- Check your internet connection

#### "Folder Not Found"
- Gmail folder names are case-sensitive
- Use exact folder names like `[Gmail]/Sent Mail`

### Debug Mode

Enable debug mode in `config/imap.php`:

```php
'debug' => true,
```

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## 📝 License

This project is open-sourced software licensed under the [MIT license](LICENSE).

## 🙏 Acknowledgments

- [Laravel Livewire](https://laravel-livewire.com/) - For reactive components
- [Laravel IMAP](https://github.com/Webklex/laravel-imap) - For IMAP functionality
- [RemixIcon](https://remixicon.com/) - For beautiful icons
- [Bootstrap](https://getbootstrap.com/) - For responsive styling

## 📞 Support

If you encounter any issues or have questions:

1. Check the [Issues](../../issues) section
2. Create a new issue with detailed information
3. Include error logs and configuration details

---

Made with ❤️ for the Laravel community
