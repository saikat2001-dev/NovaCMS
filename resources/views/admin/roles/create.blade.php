<x-layout>
    <x-slot name="title">Create Role - {{ config('app.name') }}</x-slot>

    <div @class(['flex', 'flex-col', 'items-center', 'justify-center', 'min-h-screen', 'pt-24', 'pb-12', 'px-4', 'sm:px-6', 'lg:px-8', 'bg-background'])>
        <div @class(['max-w-xl', 'w-full', 'space-y-8', 'bg-white', 'p-8', 'md:p-10', 'rounded-3xl', 'shadow-2xl', 'border', 'border-gray-100'])>
            <div @class(['text-center'])>
                <h2 @class(['text-3xl', 'font-bold', 'text-text', 'tracking-tight'])>Create New Role</h2>
                <p @class(['mt-2', 'text-sm', 'text-secondary'])>Define a new role and assign permissions.</p>
            </div>

            <form @class(['mt-8', 'space-y-6']) action="{{ route('admin.roles.store') }}" method="POST">
                @csrf
                <div @class(['space-y-6'])>
                    <div @class(['grid', 'grid-cols-1', 'gap-6', 'md:grid-cols-2'])>
                        <div @class(['md:col-span-2'])>
                            <label for="name" @class(['block', 'text-sm', 'font-semibold', 'text-text', 'mb-2'])>Role Name</label>
                            <input id="name" name="name" type="text" value="{{ old('name') }}" required @class(['appearance-none', 'block', 'w-full', 'px-4', 'py-3.5', 'border', 'border-gray-200', 'rounded-xl', 'focus:outline-none', 'focus:ring-2', 'focus:ring-primary/20', 'focus:border-primary']) placeholder="e.g. Editor">
                            @error('name') <p @class(['text-red-500', 'text-xs', 'mt-1'])>{{ $message }}</p> @enderror
                        </div>

                        <div @class(['md:col-span-2'])>
                            <label for="description" @class(['block', 'text-sm', 'font-semibold', 'text-text', 'mb-2'])>Description <span @class(['text-xs', 'font-normal', 'text-secondary'])>(Optional)</span></label>
                            <textarea id="description" name="description" rows="3" @class(['appearance-none', 'block', 'w-full', 'px-4', 'py-3.5', 'border', 'border-gray-200', 'rounded-xl', 'focus:outline-none', 'focus:ring-2', 'focus:ring-primary/20', 'focus:border-primary']) placeholder="Describe what this role can do...">{{ old('description') }}</textarea>
                            @error('description') <p @class(['text-red-500', 'text-xs', 'mt-1'])>{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div>
                        <label for="brand_id" @class(['block', 'text-sm', 'font-semibold', 'text-text', 'mb-2'])>Scope (Brand) <span @class(['text-xs', 'font-normal', 'text-secondary'])>(Leave empty for Universal)</span></label>
                        <div @class(['relative'])>
                            <select id="brand_id" name="brand_id" @class(['appearance-none', 'block', 'w-full', 'px-4', 'py-3.5', 'border', 'border-gray-200', 'rounded-xl', 'focus:outline-none', 'focus:ring-2', 'focus:ring-primary/20', 'focus:border-primary', 'bg-white'])>
                                <option value="">Universal (System Wide)</option>
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

                    <div>
                        <label @class(['block', 'text-sm', 'font-semibold', 'text-text', 'mb-4'])>Permissions</label>
                        @if($permissions->count() > 0)
                        <div @class(['grid', 'grid-cols-1', 'sm:grid-cols-2', 'gap-4'])>
                            @foreach($permissions as $permission)
                            <label @class(['flex', 'items-start', 'p-3', 'border', 'border-border', 'rounded-xl', 'cursor-pointer', 'hover:bg-slate-50', 'transition-colors'])>
                                <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" {{ in_array($permission->id, old('permissions', [])) ? 'checked' : '' }} @class(['mt-1', 'w-4', 'h-4', 'text-primary', 'border-gray-300', 'rounded', 'focus:ring-primary'])>
                                <div @class(['ml-3'])>
                                    <span @class(['block', 'text-sm', 'font-medium', 'text-text'])>{{ $permission->title }}</span>
                                    <span @class(['block', 'text-xs', 'text-secondary'])>{{ $permission->description }}</span>
                                </div>
                            </label>
                            @endforeach
                        </div>
                        @else
                            <div @class(['p-4', 'bg-yellow-50', 'text-yellow-700', 'rounded-xl', 'text-sm'])>
                                No permissions found.
                            </div>
                        @endif
                         @error('permissions') <p @class(['text-red-500', 'text-xs', 'mt-1'])>{{ $message }}</p> @enderror
                    </div>
                </div>

                <div>
                    <button type="submit" @class(['w-full', 'py-3.5', 'px-4', 'border', 'border-transparent', 'text-sm', 'font-bold', 'rounded-xl', 'text-white', 'bg-primary', 'hover:bg-primary/90', 'focus:outline-none', 'focus:ring-2', 'focus:ring-offset-2', 'focus:ring-primary', 'transition-all', 'shadow-xl', 'shadow-primary/20'])>
                        Create Role
                    </button>
                    <div @class(['mt-4', 'text-center'])>
                        <a href="{{ route('admin.roles.index') }}" @class(['text-sm', 'text-secondary', 'hover:text-primary'])>Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-layout>
