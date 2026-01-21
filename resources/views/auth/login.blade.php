<x-layout>
    <x-slot name="title">Login - {{ config('app.name') }}</x-slot>

    <div class="flex flex-col items-center justify-center min-h-screen pt-24 pb-12 px-4 sm:px-6 lg:px-8 bg-background">
        <div class="max-w-md w-full space-y-8 bg-white p-8 md:p-10 rounded-3xl shadow-2xl border border-gray-100">
            <div class="text-center">
                <div class="mx-auto h-16 w-16 bg-primary/10 rounded-2xl flex items-center justify-center mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-primary">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                      </svg>
                </div>
                <h2 class="text-3xl font-bold text-text tracking-tight">
                    Welcome back
                </h2>
                <p class="mt-2 text-sm text-secondary">
                    Sign in to your account to continue
                </p>
            </div>
            
            @if ($errors->any())
                <div class="rounded-xl bg-red-50 p-4 border border-red-100 animate-pulse">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-red-800">
                                Authentication Failed
                            </h3>
                            <div class="mt-1 text-sm text-red-700">
                                <ul class="list-none space-y-1">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <form class="mt-8 space-y-6" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="space-y-5">
                    <div>
                        <label for="email" class="block text-sm font-semibold text-text mb-2">Email address</label>
                        <input id="email" name="email" type="email" autocomplete="email" required class="appearance-none relative block w-full px-4 py-3.5 border border-gray-200 placeholder-gray-400 text-text rounded-xl focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary focus:z-10 sm:text-sm transition-all duration-200 bg-gray-50 focus:bg-white" placeholder="you@example.com" value="{{ old('email') }}">
                    </div>
                    <div>
                        <div class="flex items-center justify-between mb-2">
                             <label for="password" class="block text-sm font-semibold text-text">Password</label>
                             <div class="text-sm">
                                <a href="#" class="font-medium text-primary hover:text-indigo-600 transition-colors">
                                    Forgot password?
                                </a>
                            </div>
                        </div>
                        <input id="password" name="password" type="password" autocomplete="current-password" required class="appearance-none relative block w-full px-4 py-3.5 border border-gray-200 placeholder-gray-400 text-text rounded-xl focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary focus:z-10 sm:text-sm transition-all duration-200 bg-gray-50 focus:bg-white" placeholder="••••••••">
                    </div>
                </div>

                <div class="flex items-center">
                    <input id="remember-me" name="remember" type="checkbox" class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded transition-colors">
                    <label for="remember-me" class="ml-2 block text-sm text-secondary">
                        Remember me for 30 days
                    </label>
                </div>

                <div>
                    <button type="submit" class="group relative w-full flex justify-center py-3.5 px-4 border border-transparent text-sm font-bold rounded-xl text-white bg-primary hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-all shadow-xl hover:translate-y-px hover:shadow-primary/20">
                        Sign in to Dashboard
                    </button>
                </div>
            </form>
        </div>
        
        <p class="mt-8 text-center text-sm text-secondary">
            Don't have an account? 
            <a href="#" class="font-bold text-primary hover:text-indigo-600 transition-colors">
                Start your 14-day free trial
            </a>
        </p>
    </div>
</x-layout>
