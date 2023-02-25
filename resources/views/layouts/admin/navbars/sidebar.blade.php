<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-mini">&nbsp;</a>
            <a href="#" class="simple-text logo-normal">{{ __('SOCIAL MEDIA') }}</a>
        </div>
        <ul class="nav">


            {{-- START Products  --}}
            <li @if ($pageSlug == 'products') class="active" @endif>
                <a href="{{ route('admin.platform.index') }}">
                    <i class="tim-icons icon-app"></i>
                    <p>{{ __('custom.sidebar.platforms') }}</p>
                </a>
            </li>
            {{-- END Products  --}}


    </div>
</div>
