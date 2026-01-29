<x-layout>
    <x-slot name="title">Role Management - {{ config('app.name') }}</x-slot>

    <div @class(['p-6'])>
        <!-- Header -->
        <div @class(['flex', 'flex-col', 'md:flex-row', 'md:items-center', 'md:justify-between', 'mb-8'])>
            <div>
                <h1 @class(['text-3xl', 'font-bold', 'text-text', 'mb-2'])>Role Management</h1>
                <p @class(['text-secondary'])>Manage roles and assign permissions.</p>
            </div>
            <div @class(['mt-4', 'md:mt-0'])>
                <a href="{{ route('admin.roles.create') }}" @class(['px-5', 'py-2.5', 'bg-primary', 'text-white', 'rounded-xl', 'hover:bg-primary/90', 'transition-all', 'shadow-lg', 'shadow-primary/25', 'flex', 'items-center', 'gap-2', 'font-semibold', 'text-sm'])>
                    <svg @class(['w-5', 'h-5']) fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    <span>Create Role</span>
                </a>
            </div>
        </div>

        @if($roles->count() > 0)
        <div @class(['bg-white', 'rounded-2xl', 'border', 'border-border', 'shadow-sm', 'overflow-hidden'])>
            <div @class(['overflow-x-auto'])>
                <table @class(['w-full', 'text-left'])>
                    <thead>
                        <tr @class(['bg-slate-50'])>
                            <th @class(['px-6', 'py-4', 'text-sm', 'font-semibold', 'text-secondary'])>Role Name</th>
                            <th @class(['px-6', 'py-4', 'text-sm', 'font-semibold', 'text-secondary'])>Scope</th>
                            <th @class(['px-6', 'py-4', 'text-sm', 'font-semibold', 'text-secondary'])>Permissions</th>
                            <th @class(['px-6', 'py-4', 'text-sm', 'font-semibold', 'text-secondary', 'text-right'])>Actions</th>
                        </tr>
                    </thead>
                    <tbody @class(['divide-y', 'divide-border'])>
                        @foreach($roles as $role)
                        <tr @class(['hover:bg-slate-50/50', 'transition-colors', 'group'])>
                            <td @class(['px-6', 'py-4'])>
                                <div>
                                    <span @class(['font-medium', 'text-text', 'block'])>{{ ucfirst($role->name) }}</span>
                                    @if($role->description)
                                    <span @class(['text-xs', 'text-secondary'])>{{ $role->description }}</span>
                                    @endif
                                </div>
                            </td>
                            <td @class(['px-6', 'py-4'])>
                                @if($role->brand_id)
                                    <span @class(['inline-flex', 'items-center', 'gap-1', 'px-2.5', 'py-1', 'rounded-lg', 'text-xs', 'font-medium', 'bg-purple-50', 'text-purple-700'])>
                                        <svg @class(['w-3', 'h-3']) fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                                        Brand: {{ $role->brand->name ?? 'Unknown Brand' }}
                                    </span>
                                @else
                                    <span @class(['inline-flex', 'items-center', 'gap-1', 'px-2.5', 'py-1', 'rounded-lg', 'text-xs', 'font-medium', 'bg-blue-50', 'text-blue-700'])>
                                        <svg @class(['w-3', 'h-3']) fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        Universal
                                    </span>
                                @endif
                            </td>
                            <td @class(['px-6', 'py-4'])>
                                <div @class(['flex', 'flex-wrap', 'gap-1'])>
                                    @forelse($role->permissions as $permission)
                                        <span @class(['px-2', 'py-0.5', 'bg-slate-100', 'text-slate-600', 'rounded', 'text-[10px]', 'font-medium'])>{{ $permission->title }}</span>
                                    @empty
                                        <span @class(['text-xs', 'text-secondary', 'italic'])>No permissions</span>
                                    @endforelse
                                </div>
                            </td>
                            <td @class(['px-6', 'py-4'])>
                                <div @class(['flex', 'items-center', 'justify-end', 'gap-2'])>
                                    <a href="{{ route('admin.roles.edit', $role->id) }}" @class(['p-1.5', 'rounded-md', 'text-secondary', 'hover:bg-slate-100', 'hover:text-primary', 'transition-colors', 'block']) title="Edit Role">
                                        <svg @class(['w-4', 'h-4']) fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                    </a>
                                    
                                    @if(!in_array(strtolower($role->name), ['admin', 'user']))
                                    <form action="{{ route('admin.roles.delete', $role->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this role? This cannot be undone.');" @class(['inline-block'])>
                                        @csrf
                                        <button type="submit" @class(['p-1.5', 'rounded-md', 'text-secondary', 'hover:bg-red-50', 'hover:text-red-600', 'transition-colors']) title="Delete Role">
                                            <svg @class(['w-4', 'h-4']) fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                    </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @else
        <div @class(['bg-white', 'rounded-2xl', 'border', 'border-border', 'p-16', 'text-center'])>
            <h3 @class(['text-2xl', 'font-bold', 'text-text', 'mb-2'])>No roles found</h3>
            <p @class(['text-secondary', 'mb-8'])>Create a role to get started.</p>
             <a href="{{ route('admin.roles.create') }}" @class(['inline-flex', 'items-center', 'gap-2', 'px-6', 'py-3', 'bg-primary', 'text-white', 'rounded-xl', 'font-semibold', 'hover:bg-primary/90', 'transition-all', 'shadow-lg', 'shadow-primary/25'])>
                Create Role
            </a>
        </div>
        @endif
    </div>
</x-layout>
