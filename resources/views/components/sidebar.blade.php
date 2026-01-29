@php
    $isAdmin = App\Models\Auth::hasRole('admin');
    
    $adminLinks = [
        ['label' => 'Dashboard', 'href' => route('admin.dashboard'), 'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6'],
        ['label' => 'Brands', 'href' => route('brand.index'), 'icon' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4'],
        ['label' => 'Users', 'href' => route('admin.users.index'), 'icon' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z'],
        ['label' => 'Roles', 'href' => route('admin.roles.index'), 'icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z'],
        ['label' => 'Permissions', 'href' => route('admin.permissions.index'), 'icon' => 'M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z'],
    ];
@endphp

@if($isAdmin)
<aside id="admin-sidebar" @class(['fixed', 'left-0', 'top-20', 'h-[calc(100vh-5rem)]', 'w-64', 'bg-white', 'border-r', 'border-border', 'z-30', 'transition-all', 'duration-300', 'hidden', 'md:block', 'flex', 'flex-col'])>
    <!-- Toggle Button Section -->
    <div @class(['py-4', 'sidebar-item-container'])>
        <div @class(['flex', 'items-center', 'w-full', 'toggle-wrapper'])>
            <div @class(['flex-shrink-0', 'flex', 'items-center', 'justify-center', 'toggle-container', 'pl-[20px]'])>
                <button id="sidebar-toggle" @class(['w-10', 'h-10', 'rounded-md', 'text-secondary', 'hover:bg-slate-100', 'transition-all', 'duration-300', 'flex', 'items-center', 'justify-center'])>
                    <svg @class(['w-6', 'h-6']) fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path d="M4 4m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" />
                        <path d="M9 4v16" />
                        <path d="M14 10l2 2l-2 2" id="toggle-arrow" class="transition-transform duration-300" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Nav Links Section -->
    <div @class(['flex-grow', 'space-y-0.5', 'sidebar-content'])>
        @foreach($adminLinks as $link)
        @php
            $isActive = request()->url() == $link['href'] || (request()->routeIs('admin.dashboard') && $link['label'] == 'Dashboard');
        @endphp
        <a href="{{ $link['href'] }}" @class([
            'flex', 'items-center', 'px-0', 'py-0', 'rounded-md', 'transition-all', 'group',
            'text-secondary', 'hover:text-primary', 'admin-nav-link',
            'active' => $isActive
        ])>
            <div @class([
                'flex-shrink-0', 'w-[80px]', 'h-[64px]', 'flex', 'items-center', 'justify-center', 'transition-all', 'relative'
            ])>
                <div @class([
                    'w-10', 'h-10', 'rounded-md', 'flex', 'items-center', 'justify-center', 'transition-all',
                    'bg-primary/10 text-primary' => $isActive,
                    'text-secondary group-hover:bg-primary/10 group-hover:text-primary' => !$isActive
                ])>
                    <svg @class(['w-5', 'h-5']) fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $link['icon'] }}"></path>
                    </svg>
                </div>
            </div>
            <span @class(['font-semibold', 'sidebar-text', 'tracking-tight', 'group-hover:text-primary'])>{{ $link['label'] }}</span>
        </a>
        @endforeach
    </div>

    <!-- Bottom Action -->
    <div id="sidebar-profile" @class(['border-t', 'border-border/60', 'bg-slate-50/30', 'sidebar-footer'])>
        <div @class(['flex', 'items-center', 'w-full', 'sidebar-profile-content'])>
            <div @class(['flex-shrink-0', 'w-[80px]', 'h-[80px]', 'flex', 'items-center', 'justify-center'])>
                <div @class(['w-10', 'h-10', 'rounded-md', 'text-primary', 'flex', 'items-center', 'justify-center', 'font-bold', 'ring-2', 'ring-white'])>
                    {{ strtoupper(substr(App\Models\Auth::getUser()->fullName ?? 'A', 0, 1)) }}
                </div>
            </div>
            <div @class(['overflow-hidden', 'sidebar-text', 'pr-4'])>
                <p @class(['text-sm', 'font-bold', 'text-text', 'truncate', 'leading-none', 'mb-1'])>{{ App\Models\Auth::getUser()->fullName ?? 'Administrator' }}</p>
                <p @class(['text-[11px]', 'font-medium', 'text-secondary/80', 'truncate', 'uppercase', 'tracking-wider'])>Admin Panel</p>
            </div>
        </div>
    </div>
</aside>
@endif
