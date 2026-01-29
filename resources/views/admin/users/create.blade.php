<x-layout>
    <x-slot name="title">Add User - {{ config('app.name') }}</x-slot>

    <div @class(['flex', 'flex-col', 'items-center', 'justify-center', 'min-h-screen', 'pt-24', 'pb-12', 'px-4', 'sm:px-6', 'lg:px-8', 'bg-background'])>
        <div @class(['max-w-md', 'w-full', 'space-y-8', 'bg-white', 'p-8', 'md:p-10', 'rounded-3xl', 'shadow-2xl', 'border', 'border-gray-100'])>
            <div @class(['text-center'])>
                <h2 @class(['text-3xl', 'font-bold', 'text-text', 'tracking-tight'])>Add User</h2>
                <p @class(['mt-2', 'text-sm', 'text-secondary'])>Create a new account for your team.</p>
            </div>

            <form @class(['mt-8', 'space-y-6']) action="{{ route('admin.users.store') }}" method="POST">
                @csrf
                <div @class(['space-y-5'])>
                    <div>
                        <label for="fullName" @class(['block', 'text-sm', 'font-semibold', 'text-text', 'mb-2'])>Full Name</label>
                        <input id="fullName" name="fullName" type="text" value="{{ old('fullName') }}" required @class(['appearance-none', 'block', 'w-full', 'px-4', 'py-3.5', 'border', 'border-gray-200', 'rounded-xl', 'focus:outline-none', 'focus:ring-2', 'focus:ring-primary/20', 'focus:border-primary']) placeholder="John Doe">
                        @error('fullName') <p @class(['text-red-500', 'text-xs', 'mt-1'])>{{ $message }}</p> @enderror
                    </div>
                    
                    <div>
                        <label for="username" @class(['block', 'text-sm', 'font-semibold', 'text-text', 'mb-2'])>Username</label>
                        <input id="username" name="username" type="text" value="{{ old('username') }}" required @class(['appearance-none', 'block', 'w-full', 'px-4', 'py-3.5', 'border', 'border-gray-200', 'rounded-xl', 'focus:outline-none', 'focus:ring-2', 'focus:ring-primary/20', 'focus:border-primary']) placeholder="johndoe">
                        @error('username') <p @class(['text-red-500', 'text-xs', 'mt-1'])>{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="email" @class(['block', 'text-sm', 'font-semibold', 'text-text', 'mb-2'])>Email Address</label>
                        <input id="email" name="email" type="email" value="{{ old('email') }}" required @class(['appearance-none', 'block', 'w-full', 'px-4', 'py-3.5', 'border', 'border-gray-200', 'rounded-xl', 'focus:outline-none', 'focus:ring-2', 'focus:ring-primary/20', 'focus:border-primary']) placeholder="john@example.com">
                        @error('email') <p @class(['text-red-500', 'text-xs', 'mt-1'])>{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="password" @class(['block', 'text-sm', 'font-semibold', 'text-text', 'mb-2'])>Password</label>
                        <input id="password" name="password" type="password" required @class(['appearance-none', 'block', 'w-full', 'px-4', 'py-3.5', 'border', 'border-gray-200', 'rounded-xl', 'focus:outline-none', 'focus:ring-2', 'focus:ring-primary/20', 'focus:border-primary']) placeholder="••••••••">
                        @error('password') <p @class(['text-red-500', 'text-xs', 'mt-1'])>{{ $message }}</p> @enderror
                    </div>
                    
                    <div>
                        <label for="password_confirmation" @class(['block', 'text-sm', 'font-semibold', 'text-text', 'mb-2'])>Confirm Password</label>
                        <input id="password_confirmation" name="password_confirmation" type="password" required @class(['appearance-none', 'block', 'w-full', 'px-4', 'py-3.5', 'border', 'border-gray-200', 'rounded-xl', 'focus:outline-none', 'focus:ring-2', 'focus:ring-primary/20', 'focus:border-primary']) placeholder="••••••••">
                    </div>

                    <div>
                        <label for="brand_id" @class(['block', 'text-sm', 'font-semibold', 'text-text', 'mb-2'])>Assign Brand</label>
                        <div @class(['relative'])>
                            <select id="brand_id" name="brand_id" @class(['appearance-none', 'block', 'w-full', 'px-4', 'py-3.5', 'border', 'border-gray-200', 'rounded-xl', 'focus:outline-none', 'focus:ring-2', 'focus:ring-primary/20', 'focus:border-primary', 'bg-white']) required>
                                <option value="">Select a brand</option>
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                                @endforeach
                            </select>
                            <div @class(['absolute', 'inset-y-0', 'right-0', 'flex', 'items-center', 'px-4', 'pointer-events-none'])>
                                <svg @class(['w-5', 'h-5', 'text-secondary']) fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>
                        @error('brand_id') <p @class(['text-red-500', 'text-xs', 'mt-1'])>{{ $message }}</p> @enderror
                    </div>
                </div>

                <div>
                    <button type="submit" @class(['w-full', 'py-3.5', 'px-4', 'border', 'border-transparent', 'text-sm', 'font-bold', 'rounded-xl', 'text-white', 'bg-primary', 'hover:bg-primary/90', 'focus:outline-none', 'focus:ring-2', 'focus:ring-offset-2', 'focus:ring-primary', 'transition-all', 'shadow-xl', 'shadow-primary/20'])>
                        Create User
                    </button>
                    <div @class(['mt-4', 'text-center'])>
                        <a href="{{ route('admin.users.index') }}" @class(['text-sm', 'text-secondary', 'hover:text-primary'])>Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-layout>
