<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-mini">&nbsp;</a>
            <a href="#" class="simple-text logo-normal">{{ __('SOCIAL MEDIA') }}</a>
        </div>
        <ul class="nav">


            {{-- START Users Profile  --}}
            <li @if ($pageSlug == 'platforms') class="active" @endif>
                <a href="{{ route('admin.user_profile') }}">
                    <i class="tim-icons icon-app"></i>
                    <p>{{ __('custom.sidebar.profiles') }}</p>
                </a>
            </li>
            {{-- END Users Profile  --}}


            {{-- START Products  --}}
            <li @if ($pageSlug == 'platforms') class="active" @endif>
                <a href="{{ route('admin.platform.index') }}">
                    <i class="tim-icons icon-app"></i>
                    <p>{{ __('custom.sidebar.platforms') }}</p>
                </a>
            </li>
            {{-- END Products  --}}

            {{-- START Products  --}}
            <li @if ($pageSlug == 'services') class="active" @endif>
                <a href="{{ route('admin.service.index') }}">
                    <i class="tim-icons icon-app"></i>
                    <p>{{ __('custom.sidebar.services') }}</p>
                </a>
            </li>
            {{-- END Products  --}}


    </div>
</div>
