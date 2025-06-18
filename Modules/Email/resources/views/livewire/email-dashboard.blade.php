<div class="row">
    <div class="col-lg-3">
        <div class="card ">
            <div class="card-body">
                <div class="">
                    <div class="iq-email-list">
                        <button class="btn btn-primary-subtle btn-lg btn-block mb-3 font-size-16 p-3 w-100"
                                data-target="#compose-email-popup"
                                data-bs-toggle="modal"><i class="ri-send-plane-line me-2"></i>New Message
                        </button>
                        <div class="iq-email-ui nav flex-column nav-pills"
                             role="tablist">
                            @foreach ($folders as $folder)
                                <li class="nav-link @if ($selectedFolder == '[Gmail]/' . $folder['name']) active @endif"
                                    role="tab"
                                    data-bs-toggle="pill"
                                    href="#mail-{{ $folder['name'] }}"
                                    aria-selected="true">

                                    <a wire:click="selectFolder('[Gmail]/{{ $folder['name'] }}')"
                                       href="javascript:void(0)">
                                        <i class="{{ $folder['icon'] }}"></i> {{ $folder['name'] }}

                                        {{-- Show Count Badge --}}
                                        @if ($folder['count'] > 0)
                                            <span class="badge bg-primary ms-2">{{ $folder['count'] }}</span>
                                        @endif


                                    </a>
                                </li>
                            @endforeach
                        </div>

                        <div class="iq-progress-bar-linear d-inline-block w-100">
                            <h6 class="mt-4 mb-3">Storage</h6>
                            <div class="progress"
                                 role="progressbar"
                                 aria-label="Danger example"
                                 aria-valuenow="100"
                                 aria-valuemin="90"
                                 aria-valuemax="100"
                                 style="transition: width 2s ease 0s; width: 90%; height: 6px;">
                                <div class="progress-bar bg-danger"
                                     style="width: 90%"></div>
                            </div>
                            <span class="mt-1 d-inline-block w-100">7.02 GB (46%) of 15 GB used</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-9 mail-box-detail">
        <div class="card">
            <div class="card-body p-0">
                <div class="">
                    <div class="iq-email-to-list p-3">
                        <div class="iq-email-to-list-detail d-flex justify-content-between gap-3">
                            <ul
                                class="list-inline d-flex align-items-center justify-content-between m-0 p-0 flex-shrink-0">


                                <li></li>
                                <li class="me-1"
                                    data-bs-toggle="tooltip"
                                    data-bs-placement="top"
                                    aria-label="Reload"
                                    data-bs-original-title="Reload"><a
                                       wire:click="selectFolder('{{ $selectedFolder }}')"
                                       href="javascript:void(0)"><i class="ri-restart-line"></i></a></li>

                                <li class="me-1"
                                    data-bs-toggle="tooltip"
                                    data-bs-placement="top"
                                    aria-label="Delete"
                                    data-bs-original-title="Delete"><a wire:click='deletecheckEmails'
                                       href="javascript:void(0)"><i class="ri-delete-bin-line"></i></a></li>


                            </ul>
                            <div class="iq-email-search d-flex flex-shrink-0">
                                <form class="me-3 position-relative">
                                    <div class="form-group mb-0">
                                        <input type="email"
                                               class="form-control"
                                               id="exampleInputEmail1"
                                               aria-describedby="emailHelp"
                                               placeholder="Search">
                                        <a class="search-link"
                                           href="javascript:void(0)"><i class="ri-search-line"></i></a>
                                    </div>
                                </form>


                                @if (count($emails) > 0)
                                    <ul class="list-inline d-flex align-items-center justify-content-between m-0 p-0">
                                        {{-- Pagination summary and per-page selector --}}
                                        <li class="me-3">

                                            <a class="font-size-14 d-flex gap-1"
                                               href="javascript:void(0)"
                                               data-bs-toggle="dropdown">
                                                <span>{{ ($page - 1) * $perPage + 1 }}</span>
                                                <span>-</span>
                                                <span>{{ min($page * $perPage, $totalMessages) }}</span>
                                                <span>of</span>
                                                <span>{{ $totalMessages }}</span>
                                            </a>


                                        </li>

                                        {{-- Previous Page --}}
                                        <li class="me-2"
                                            data-bs-toggle="tooltip"
                                            data-bs-placement="top"
                                            aria-label="Previous"
                                            data-bs-original-title="Previous">
                                            <a href="javascript:void(0)"
                                               @if ($page > 1) wire:click="previousPage" @else style="pointer-events: none; opacity: 0.5;" @endif>
                                                <i class="ri-arrow-left-s-line transform-arrow"></i>
                                            </a>
                                        </li>

                                        {{-- Next Page --}}
                                        <li class="me-2"
                                            data-bs-toggle="tooltip"
                                            data-bs-placement="top"
                                            aria-label="Next"
                                            data-bs-original-title="Next">
                                            <a href="javascript:void(0)"
                                               @if ($hasMorePages) wire:click="nextPage" @else style="pointer-events: none; opacity: 0.5;" @endif>
                                                <i class="ri-arrow-right-s-line transform-arrow"></i>
                                            </a>
                                        </li>


                                    </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="iq-email-listbox">
                        <div class="tab-content">
                            <div class="tab-pane fade show active "
                                 id="mail-inbox"
                                 role="tabpanel"
                                 wire:loading.class="loading-bg"
                                 wire:target="selectFolder,nextPage,previousPage,deletecheckEmails">
                                <ul class="iq-email-sender-list iq-height"
                                    wire:loading.class="filter-blur-2"
                                    wire:target="selectFolder,nextPage,previousPage,deletecheckEmails">
                                    @if (count($emails) > 0)
                                        @foreach ($emails as $email)
                                            <li class="{{ $email['is_seen'] ? '' : 'iq-unread' }}">
                                                <div class="d-flex align-self-center iq-unread-inner">
                                                    <!-- Checkbox -->
                                                    <div class="iq-email-sender-info">
                                                        <div class="iq-checkbox-mail">
                                                            <div class="form-check">
                                                                <input type="checkbox"
                                                                       wire:model="selectedEmails"
                                                                       value="{{ $email['uid'] }}"
                                                                       class="form-check-input"
                                                                       id="mail_{{ $email['uid'] }}">
                                                                <label class="form-check-label"
                                                                       for="mail_{{ $email['uid'] }}"></label>
                                                            </div>
                                                        </div>

                                                        <!-- Star toggle -->
                                                        <span
                                                              class="ri-star-line iq-star-toggle {{ $email['is_seen'] ? '' : 'text-warning' }}"></span>

                                                        <!-- From Name -->
                                                        <a href="javascript:void(0)"
                                                           wire:click="showMail({{ $email['uid'] }})"
                                                           class="iq-email-title">
                                                            {{ $email['from_name'] }}
                                                        </a>
                                                    </div>

                                                    <!-- Subject + Body Snippet -->
                                                    <div class="iq-email-content">
                                                        <a href="javascript:void(0)"
                                                           class="iq-email-subject">
                                                            {!! $email['subject'] !!}
                                                            &nbsp;–&nbsp;
                                                            <span>{!! $email['body'] !!}</span>
                                                        </a>
                                                        <div class="iq-email-date">
                                                            {{ $email['date'] }}</div>
                                                    </div>

                                                    <!-- Actions -->
                                                    {{-- <ul class="iq-social-media">
                                                        <li>
                                                            <a href="javascript:void(0)"
                                                               wire:click="deleteEmail({{ $email['uid'] }})">
                                                                <i class="ri-delete-bin-2-line"></i>
                                                            </a>
                                                        </li>

                                                    </ul> --}}
                                                </div>
                                            </li>
                                        @endforeach
                                    @else
                                        <li>
                                            <div class="d-flex justify-content-center">
                                                No sent messages! <a class="x0"
                                                   role="link"
                                                   tabindex="0"
                                                   style="margin: 0 2px;">Send</a> one now!
                                            </div>
                                        </li>

                                    @endif
                                </ul>
                                @if ($modal == 'show')
                                    <div class="email-app-details {{ $modal }}">
                                        <div class="card">
                                            <div class="card-body p-0">
                                                <div class="">
                                                    <div class="iq-email-to-list p-3">
                                                        <div class="d-flex justify-content-between">
                                                            <ul
                                                                class="list-inline d-flex align-items-center justify-content-between m-0 p-0">
                                                                <li class="me-3">
                                                                    <a href="javascript: void(0);"
                                                                       class="email-remove">
                                                                        <h4 class="m-0"><i
                                                                               class="ri-arrow-left-line"></i>
                                                                        </h4>
                                                                    </a>
                                                                </li>

                                                            </ul>

                                                        </div>
                                                    </div>
                                                    <hr class="mt-0" />
                                                    <div class="iq-inbox-subject p-3">
                                                        <h5 class="mb-2">{{ $singleEmail['subject'] }}
                                                        </h5>
                                                        <div class="iq-inbox-subject-info">
                                                            <div class="iq-subject-info">
                                                                <img src="{{ $singleEmail['profile_image'] }}"
                                                                     class="img-fluid rounded-circle avatar-80"
                                                                     alt="#"
                                                                     loading="lazy" />
                                                                <div class="iq-subject-status align-self-center">
                                                                    <h6 class="mb-0">
                                                                        {{ $singleEmail['from_name'] }}

                                                                    </h6>
                                                                    <div class="dropdown">
                                                                        <a class="dropdown-toggle"
                                                                           href="inbox.html#"
                                                                           id="dropdownMenuButton"
                                                                           data-bs-toggle="dropdown"
                                                                           aria-haspopup="true"
                                                                           aria-expanded="false">
                                                                            to Me
                                                                        </a>
                                                                        <div class="dropdown-menu font-size-12"
                                                                             aria-labelledby="dropdownMenuButton">
                                                                            <table class="iq-inbox-details">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>from:</td>
                                                                                        <td>{{ $singleEmail['from_name'] }}
                                                                                            <span>{{ $singleEmail['from'] }}</span>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>reply-to:
                                                                                        </td>
                                                                                        <td>{{ $singleEmail['reply_to'] }}
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>to:</td>
                                                                                        <td>{{ $singleEmail['to'] }}
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>date:</td>
                                                                                        <td>{{ $singleEmail['date'] }}
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>subject:
                                                                                        </td>
                                                                                        <td>{{ $singleEmail['subject'] }}
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>security:
                                                                                        </td>
                                                                                        <td>Standard
                                                                                            encryption
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <span
                                                                      class="align-self-center">{{ $singleEmail['date'] }}</span>
                                                            </div>
                                                            <div class="iq-inbox-body mt-5">
                                                                <div class="email-html-content"
                                                                     style="width: 100%; height: 300px; border: none; overflow: overlay;">
                                                                    {!! $singleEmail['body'] !!}
                                                                </div>
                                                            </div>
                                                            @if (count($singleEmail['attachments']) > 0)
                                                                <hr />

                                                                <div class="attegement">
                                                                    <h6 class="mb-2">
                                                                        {{ count($singleEmail['attachments']) }}
                                                                        Attachments:</h6>
                                                                    <ul>
                                                                        @foreach ($singleEmail['attachments'] as $attachment)
                                                                            <li
                                                                                class="icon icon-attegment d-flex align-items-center">
                                                                                <a href="javascript:void(0)"
                                                                                   wire:click="downloadAttachment('{{ $attachment['name'] }}')"
                                                                                   class="text-decoration-none">
                                                                                    <i class="ri-download-2-line"></i>
                                                                                </a>
                                                                                <label class="custom-control-label"
                                                                                       for="check1"></label>

                                                                                <span
                                                                                      class="ms-1">{{ $attachment['name'] }}</span>
                                                                            </li>
                                                                        @endforeach

                                                                    </ul>
                                                                    <div class="d-flex gap-2 mt-3 ">
                                                                        <button class=" btn btn-primary">
                                                                            <i class="ri-reply-line"></i>
                                                                            Reply</button>
                                                                        <button class="btn btn-primary"><i
                                                                               class="ri-send-plane-fill"></i>
                                                                            Forword</button>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
