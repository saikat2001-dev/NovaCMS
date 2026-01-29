<x-layout>
    <x-slot name="title">Edit User - {{ config('app.name') }}</x-slot>

    <div @class(['flex', 'flex-col', 'items-center', 'justify-center', 'min-h-screen', 'pt-24', 'pb-12', 'px-4', 'sm:px-6', 'lg:px-8', 'bg-background'])>
        <div @class(['max-w-md', 'w-full', 'space-y-8', 'bg-white', 'p-8', 'md:p-10', 'rounded-3xl', 'shadow-2xl', 'border', 'border-gray-100'])>
            <div @class(['text-center'])>
                <h2 @class(['text-3xl', 'font-bold', 'text-text', 'tracking-tight'])>Edit User & Permissions</h2>
                <p @class(['mt-2', 'text-sm', 'text-secondary'])>Update user details and access rights.</p>
            </div>

            <form @class(['mt-8', 'space-y-6']) action="{{ route('admin.users.update', $user->id) }}" method="POST">
                @csrf
                <!-- Using POST as route is defined as POST in simple setup, though PUT is semantically correct -->
                
                <div @class(['space-y-5'])>
                    <div>
                        <label for="fullName" @class(['block', 'text-sm', 'font-semibold', 'text-text', 'mb-2'])>Full Name</label>
                        <input id="fullName" name="fullName" type="text" value="{{ old('fullName', $user->fullName) }}" required @class(['appearance-none', 'block', 'w-full', 'px-4', 'py-3.5', 'border', 'border-gray-200', 'rounded-xl', 'focus:outline-none', 'focus:ring-2', 'focus:ring-primary/20', 'focus:border-primary'])>
                        @error('fullName') <p @class(['text-red-500', 'text-xs', 'mt-1'])>{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label @class(['block', 'text-sm', 'font-semibold', 'text-text', 'mb-3'])>Roles</label>
                        <div @class(['space-y-3'])>
                            <label @class(['flex', 'items-center', 'p-3', 'border', 'border-border', 'rounded-xl', 'cursor-pointer', 'hover:bg-slate-50', 'transition-colors'])>
                                <input type="checkbox" name="roles[]" value="user" {{ in_array('user', $user->roles) ? 'checked' : '' }} @class(['w-5', 'h-5', 'text-primary', 'border-gray-300', 'rounded', 'focus:ring-primary'])>
                                <div @class(['ml-3'])>
                                    <span @class(['block', 'text-sm', 'font-medium', 'text-text'])>User</span>
                                    <span @class(['block', 'text-xs', 'text-secondary'])>Basic access privileges</span>
                                </div>
                            </label>

                            <label @class(['flex', 'items-center', 'p-3', 'border', 'border-border', 'rounded-xl', 'cursor-pointer', 'hover:bg-slate-50', 'transition-colors'])>
                                <input type="checkbox" name="roles[]" value="admin" {{ in_array('admin', $user->roles) ? 'checked' : '' }} @class(['w-5', 'h-5', 'text-primary', 'border-gray-300', 'rounded', 'focus:ring-primary'])>
                                <div @class(['ml-3'])>
                                    <span @class(['block', 'text-sm', 'font-medium', 'text-text'])>Admin</span>
                                    <span @class(['block', 'text-xs', 'text-secondary'])>Full system access and management</span>
                                </div>
                            </label>
                        </div>
                        @error('roles') <p @class(['text-red-500', 'text-xs', 'mt-1'])>{{ $message }}</p> @enderror
                    </div>
                </div>

                <div>
                    <button type="submit" @class(['w-full', 'py-3.5', 'px-4', 'border', 'border-transparent', 'text-sm', 'font-bold', 'rounded-xl', 'text-white', 'bg-primary', 'hover:bg-primary/90', 'focus:outline-none', 'focus:ring-2', 'focus:ring-offset-2', 'focus:ring-primary', 'transition-all', 'shadow-xl', 'shadow-primary/20'])>
                        Update User
                    </button>
                    <div @class(['mt-4', 'text-center'])>
                        <a href="{{ route('admin.users.index') }}" @class(['text-sm', 'text-secondary', 'hover:text-primary'])>Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-layout>
