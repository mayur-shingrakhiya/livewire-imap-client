@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show mb-3 d-flex gap-2"
         role="alert">
        <i class="ph ph-thumbs-up"></i>
        <span> {{ session('success') }}</span>
        <button type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="Close"></button>
    </div>
@endif

@if (session('info'))
    <div class="alert alert-info alert-dismissible fade show mb-3 d-flex gap-2"
         role="alert">
        <i class="ph ph-bell-ringing"></i>
        <span> {{ session('info') }} </span>
        <button type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="Close"></button>
    </div>
@endif
@if (session('warning'))
    <div class="alert alert-warning alert-dismissible fade show mb-3 d-flex gap-2"
         role="alert">
        <i class="ph ph-bell-ringing"></i>
        <span> {{ session('warning') }}</span>
        <button type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="Close"></button>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show d-flex gap-2"
         role="alert">
        <i class="ph ph-lifebuoy"></i>
        <span>{{ session('error') }}</span>
        <button type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="Close"></button>
    </div>
@endif
