<x-layout>
    <x-slot name="title">Sign Up - {{ config('app.name') }}</x-slot>

    <div @class(['flex', 'flex-col', 'items-center', 'justify-center', 'min-h-screen', 'pt-24', 'pb-12', 'px-4', 'sm:px-6', 'lg:px-8', 'bg-background'])>
        <div @class(['max-w-md', 'w-full', 'space-y-8', 'bg-white', 'p-8', 'md:p-10', 'rounded-3xl', 'shadow-2xl', 'border', 'border-gray-100'])>
            <div @class(['text-center'])>
                <div @class(['mx-auto', 'h-16', 'w-16', 'bg-primary/10', 'rounded-2xl', 'flex', 'items-center', 'justify-center', 'mb-6'])>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" @class(['w-8', 'h-8', 'text-primary'])>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                      </svg>
                </div>
                <h2 @class(['text-3xl', 'font-bold', 'text-text', 'tracking-tight'])>
                    Create an account
                </h2>
                <p @class(['mt-2', 'text-sm', 'text-secondary'])>
                    Start your 14-day free trial today
                </p>
            </div>

            <form @class(['mt-8', 'space-y-6']) action="/auth/signup" method="POST">
                @csrf
                <div @class(['space-y-5'])>
                    <!-- Account Type -->
                    <div>
                        <label @class(['block', 'text-sm', 'font-semibold', 'text-text', 'mb-3'])>Account Type</label>
                        <div @class(['grid', 'grid-cols-2', 'gap-4'])>
                            <label @class(['relative', 'flex', 'cursor-pointer', 'rounded-xl', 'border', 'border-gray-200', 'bg-white', 'p-4', 'shadow-sm', 'focus:outline-none', 'hover:border-primary/50', 'transition-all', 'has-[:checked]:border-primary', 'has-[:checked]:ring-1', 'has-[:checked]:ring-primary'])>
                                <input type="radio" name="role" value="user" @class(['sr-only']) checked onchange="toggleBrandField(false)">
                                <span @class(['flex', 'flex-1'])>
                                    <span @class(['flex', 'flex-col'])>
                                        <span @class(['block', 'text-sm', 'font-bold', 'text-text'])>User</span>
                                        <span @class(['mt-1', 'flex', 'items-center', 'text-xs', 'text-secondary'])>Individual account</span>
                                    </span>
                                </span>
                                <svg @class(['h-5', 'w-5', 'text-primary', 'hidden', '[[type=radio]:checked~&]:block']) viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                            </label>

                            <label @class(['relative', 'flex', 'cursor-pointer', 'rounded-xl', 'border', 'border-gray-200', 'bg-white', 'p-4', 'shadow-sm', 'focus:outline-none', 'hover:border-primary/50', 'transition-all', 'has-[:checked]:border-primary', 'has-[:checked]:ring-1', 'has-[:checked]:ring-primary'])>
                                <input type="radio" name="role" value="admin" @class(['sr-only']) onchange="toggleBrandField(true)">
                                <span @class(['flex', 'flex-1'])>
                                    <span @class(['flex', 'flex-col'])>
                                        <span @class(['block', 'text-sm', 'font-bold', 'text-text'])>Admin</span>
                                        <span @class(['mt-1', 'flex', 'items-center', 'text-xs', 'text-secondary'])>Business account</span>
                                    </span>
                                </span>
                                <svg @class(['h-5', 'w-5', 'text-primary', 'hidden', '[[type=radio]:checked~&]:block']) viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                            </label>
                        </div>
                    </div>

                    <!-- Brand Name Input (Conditional) -->
                    <div id="brand-field" @class(['hidden', 'space-y-2', 'transition-all', 'duration-300'])>
                        <label for="brand_name" @class(['block', 'text-sm', 'font-semibold', 'text-text'])>Brand Name</label>
                        <input id="brand_name" name="brand_name" type="text" @class(['appearance-none', 'relative', 'block', 'w-full', 'px-4', 'py-3.5', 'border', 'border-gray-200' => !$errors->has('brand_name'),
                        'border-red-500 focus:border-red-500 focus:ring-red-500/20' => $errors->has('brand_name'), 'placeholder-gray-400', 'text-text', 'rounded-xl', 'focus:outline-none', 'focus:ring-2', 'focus:ring-primary/20', 'focus:border-primary', 'focus:z-10', 'sm:text-sm', 'transition-all', 'duration-200', 'bg-gray-50', 'focus:bg-white']) placeholder="Acme Inc.">
                        @error('brand_name')
                            <p @class(['text-red-500', 'text-xs', 'mt-1'])>{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Full Name Input -->
                    <div>
                        <label for="fullName" @class(['block', 'text-sm', 'font-semibold', 'text-text', 'mb-2'])>Full Name</label>
                        <input id="fullName" name="fullName" type="text" autocomplete="name" value="{{ old('fullName') }}" @class(['appearance-none', 'relative', 'block', 'w-full', 'px-4', 'py-3.5', 'border', 'border-gray-200' => !$errors->has('fullName'),
                        'border-red-500 focus:border-red-500 focus:ring-red-500/20' => $errors->has('fullName'), 'placeholder-gray-400', 'text-text', 'rounded-xl', 'focus:outline-none', 'focus:ring-2', 'focus:ring-primary/20', 'focus:border-primary', 'focus:z-10', 'sm:text-sm', 'transition-all', 'duration-200', 'bg-gray-50', 'focus:bg-white']) placeholder="Saikat Das">
                    </div>

                    <!-- Username Input -->
                    <div>
                        <label for="username" @class(['block', 'text-sm', 'font-semibold', 'text-text', 'mb-2'])>Username</label>
                        <input id="username" name="username" type="text" autocomplete="username" value="{{ old('username') }}" @class(['appearance-none', 'relative', 'block', 'w-full', 'px-4', 'py-3.5', 'border', 'border-gray-200' => !$errors->has('username'),
                        'border-red-500 focus:border-red-500 focus:ring-red-500/20' => $errors->has('username'), 'placeholder-gray-400', 'text-text', 'rounded-xl', 'focus:outline-none', 'focus:ring-2', 'focus:ring-primary/20', 'focus:border-primary', 'focus:z-10', 'sm:text-sm', 'transition-all', 'duration-200', 'bg-gray-50', 'focus:bg-white']) placeholder="saikat_das">
                    </div>

                    <!-- Email Input -->
                    <div>
                        <label for="email" @class(['block', 'text-sm', 'font-semibold', 'text-text', 'mb-2'])>Email address</label>
                        <input id="email" name="email" type="email" autocomplete="email" value="{{ old('email') }}" @class(['appearance-none', 'relative', 'block', 'w-full', 'px-4', 'py-3.5', 'border', 'border-gray-200' => !$errors->has('email'),
                        'border-red-500 focus:border-red-500 focus:ring-red-500/20' => $errors->has('email'), 'placeholder-gray-400', 'text-text', 'rounded-xl', 'focus:outline-none', 'focus:ring-2', 'focus:ring-primary/20', 'focus:border-primary', 'focus:z-10', 'sm:text-sm', 'transition-all', 'duration-200', 'bg-gray-50', 'focus:bg-white']) placeholder="you@example.com">
                    </div>

                    <!-- Password Input -->
                    <div>
                        <label for="password" @class(['block', 'text-sm', 'font-semibold', 'text-text', 'mb-2'])>Password</label>
                        <input id="password" name="password" type="password" autocomplete="new-password" @class(['appearance-none', 'relative', 'block', 'w-full', 'px-4', 'py-3.5', 'border', 'border-gray-200' => !$errors->has('password'),
                        'border-red-500 focus:border-red-500 focus:ring-red-500/20' => $errors->has('password'), 'placeholder-gray-400', 'text-text', 'rounded-xl', 'focus:outline-none', 'focus:ring-2', 'focus:ring-primary/20', 'focus:border-primary', 'focus:z-10', 'sm:text-sm', 'transition-all', 'duration-200', 'bg-gray-50', 'focus:bg-white']) placeholder="••••••••">
                    </div>

                    <!-- Confirm Password Input -->
                    <div>
                        <label for="password_confirmation" @class(['block', 'text-sm', 'font-semibold', 'text-text', 'mb-2'])>Confirm Password</label>
                        <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" @class(['appearance-none', 'relative', 'block', 'w-full', 'px-4', 'py-3.5', 'border', 'border-gray-200' => !$errors->has('password_confirmation'),
                        'border-red-500 focus:border-red-500 focus:ring-red-500/20' => $errors->has('password_confirmation'), 'placeholder-gray-400', 'text-text', 'rounded-xl', 'focus:outline-none', 'focus:ring-2', 'focus:ring-primary/20', 'focus:border-primary', 'focus:z-10', 'sm:text-sm', 'transition-all', 'duration-200', 'bg-gray-50', 'focus:bg-white']) placeholder="••••••••">
                    </div>
                </div>

                <script>
                    function toggleBrandField(show) {
                        const field = document.getElementById('brand-field');
                        if (show) {
                            field.classList.remove('hidden');
                        } else {
                            field.classList.add('hidden');
                        }
                    }
                    // Handle initial state if validation fails
                    document.addEventListener('DOMContentLoaded', function() {
                        const role = document.querySelector('input[name="role"]:checked').value;
                        toggleBrandField(role === 'admin');
                    });
                </script>
                <div>
                    <button type="submit" @class(['group', 'relative', 'w-full', 'flex', 'justify-center', 'py-3.5', 'px-4', 'border', 'border-transparent', 'text-sm', 'font-bold', 'rounded-xl', 'text-white', 'bg-primary', 'hover:bg-indigo-700', 'focus:outline-none', 'focus:ring-2', 'focus:ring-offset-2', 'focus:ring-primary', 'transition-all', 'shadow-xl', 'hover:translate-y-px', 'hover:shadow-primary/20'])>
                        Create Account
                    </button>
                </div>
                </div>

            </form>
            <p @class(['mt-8', 'text-center', 'text-sm', 'text-secondary'])>
                Already have an account? 
                <a href="{{ route('login') }}" @class(['font-bold', 'text-primary', 'hover:text-indigo-600', 'transition-colors'])>
                    Sign in
                </a>
            </p>
        </div>
        
    </div>
</x-layout>
