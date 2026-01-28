<nav class="fixed w-full z-40 bg-white/80 backdrop-blur-md border-b border-border transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20 items-center">
            <div @class(['flex-shrink-0', 'flex', 'items-center', 'gap-4'])>
                <div @class(['flex', 'items-center', 'gap-2'])>
                    <div @class(['w-8', 'h-8', 'rounded-lg', 'bg-primary', 'flex', 'items-center', 'justify-center', 'text-white', 'font-bold', 'text-xl'])>
                        C
                    </div>
                    <span @class(['font-bold', 'text-2xl', 'tracking-tighter', 'text-text'])>{{ config('app.name') }}</span>
                </div>
            </div>
            
            <!-- Desktop Menu -->
            @php
                $menuItems = [
                    // ['label' => 'Features', 'href' => '#features', 'auth' => 'both'],
                    // ['label' => 'Pricing', 'href' => '#pricing', 'auth' => 'both'],
                    // ['label' => 'Testimonials', 'href' => '#testimonials', 'auth' => 'both'],
                ];

                $isAuth = App\Models\Auth::checkAuth();
            @endphp

            <div class="md:flex space-x-8 items-center">
                @foreach($menuItems as $item)
                    @if($item['auth'] === 'both' || ($item['auth'] === 'auth' && $isAuth) || ($item['auth'] === 'guest' && !$isAuth))
                        <a href="{{ $item['href'] }}" class="text-secondary hover:text-primary font-medium transition-colors">{{ $item['label'] }}</a>
                    @endif
                @endforeach

                @if($isAuth)
                    <div class="relative group">
                        <button class="flex items-center gap-2 px-4 py-2 rounded-full bg-primary/10 text-primary font-medium hover:bg-primary/20 transition-all">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            <span>Profile</span>
                            <svg class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        
                        <div class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-xl border border-border opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform origin-top-right group-hover:scale-100 scale-95 z-50">
                            <div class="p-2">
                                @if(App\Models\Auth::hasRole('admin'))
                                    <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-sm text-secondary hover:bg-slate-50 hover:text-primary rounded-lg transition-colors">Admin Dashboard</a>
                                @else
                                    <a href="{{ route('user.dashboard') }}" class="block px-4 py-2 text-sm text-secondary hover:bg-slate-50 hover:text-primary rounded-lg transition-colors">User Dashboard</a>
                                @endif
                                <hr class="my-1 border-border">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50 rounded-lg transition-colors">
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="px-5 py-2.5 rounded-full bg-text text-white font-medium hover:bg-opacity-90 transition-all transform hover:-translate-y-0.5 hover:shadow-lg">Login</a>
                @endif
            </div>
        </div>
    </div>
</nav>
