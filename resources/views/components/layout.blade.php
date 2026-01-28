<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
@php
    $isAdmin = App\Models\Auth::hasRole('admin');
@endphp

<body class="antialiased bg-background text-text flex flex-col min-h-screen {{ $isAdmin ? 'admin-layout' : '' }}">
    <x-header />
    <x-sidebar />

    <main class="flex-grow mt-20">
        {{ $slot }}
    </main>

    <x-footer />
    <x-flash-messages />

    <style>
        .admin-layout main, .admin-layout footer {
            margin-left: 256px;
        }
        #admin-sidebar {
            overflow-x: hidden;
            white-space: nowrap;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            background: #ffffff;
            box-shadow: 4px 0 24px -10px rgba(0, 0, 0, 0.05);
        }
        .sidebar-collapsed #admin-sidebar {
            width: 80px;
        }
        .sidebar-collapsed main, .sidebar-collapsed footer {
            margin-left: 80px;
        }
        
        /* Consistent Icon Track */
        .toggle-wrapper, .admin-nav-link, .sidebar-profile-content {
            padding-left: 0 !important;
            padding-right: 0 !important;
            width: 100%;
            display: flex;
            align-items: center;
        }
        
        .toggle-container, .admin-nav-link > div:first-child, .sidebar-profile-content > div:first-child {
            /* width: 80px !important; */
            /* min-width: 80px !important; */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .sidebar-text {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            opacity: 1;
            transform: translateX(0);
        }

        .sidebar-collapsed .sidebar-text {
            opacity: 0;
            transform: translateX(-30px);
            pointer-events: none;
        }

        .sidebar-collapsed #toggle-arrow {
            transform: rotate(180deg);
        }
        
        #toggle-arrow {
            transform-origin: center;
        }

        main, footer {
            transition: margin-left 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Nav Link Hover & Active */
        .admin-nav-link {
            position: relative;
            overflow: hidden;
        }
        .admin-nav-link::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 4px;
            height: 0;
            background: #3b82f6; /* primary */
            border-radius: 0 4px 4px 0;
            transition: height 0.3s ease;
        }
        .admin-nav-link.active::before {
            height: 24px;
        }
        .admin-nav-link.active {
            color: #3b82f6;
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    
    <script>
        $(document).ready(function() {
            const sidebarToggle = $('#sidebar-toggle');
            const body = $('body');
            
            // Load state
            if (localStorage.getItem('sidebar-collapsed') === 'true') {
                body.addClass('sidebar-collapsed');
            }

            sidebarToggle.on('click', function() {
                body.toggleClass('sidebar-collapsed');
                localStorage.setItem('sidebar-collapsed', body.hasClass('sidebar-collapsed'));
            });
        });
    </script>
</body>
</html>
