<x-layout>
    <x-slot name="title">User Management - {{ config('app.name') }}</x-slot>

    <div @class(['p-6'])>
        <!-- Header -->
        <div @class(['flex', 'flex-col', 'md:flex-row', 'md:items-center', 'md:justify-between', 'mb-8'])>
            <div>
                <h1 @class(['text-3xl', 'font-bold', 'text-text', 'mb-2'])>User Management</h1>
                <p @class(['text-secondary'])>Manage users and their permissions.</p>
            </div>
            <div @class(['mt-4', 'md:mt-0'])>
                <a href="{{ route('admin.users.create') }}" @class(['px-5', 'py-2.5', 'bg-primary', 'text-white', 'rounded-xl', 'hover:bg-primary/90', 'transition-all', 'shadow-lg', 'shadow-primary/25', 'flex', 'items-center', 'gap-2', 'font-semibold', 'text-sm'])>
                    <svg @class(['w-5', 'h-5']) fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    <span>Add User</span>
                </a>
            </div>
        </div>

        @if($users->count() > 0)
        <div @class(['bg-white', 'rounded-2xl', 'border', 'border-border', 'shadow-sm', 'overflow-hidden'])>
            <div @class(['overflow-x-auto'])>
                <table @class(['w-full', 'text-left'])>
                    <thead>
                        <tr @class(['bg-slate-50'])>
                            <th @class(['px-6', 'py-4', 'text-sm', 'font-semibold', 'text-secondary'])>User</th>
                            <th @class(['px-6', 'py-4', 'text-sm', 'font-semibold', 'text-secondary'])>Email</th>
                            <th @class(['px-6', 'py-4', 'text-sm', 'font-semibold', 'text-secondary'])>Roles</th>
                            <th @class(['px-6', 'py-4', 'text-sm', 'font-semibold', 'text-secondary', 'text-right'])>Actions</th>
                        </tr>
                    </thead>
                    <tbody @class(['divide-y', 'divide-border'])>
                        @foreach($users as $user)
                        <tr @class(['hover:bg-slate-50/50', 'transition-colors', 'group'])>
                            <td @class(['px-6', 'py-4'])>
                                <div @class(['flex', 'items-center', 'gap-3'])>
                                    <div @class(['w-8', 'h-8', 'rounded-full', 'bg-slate-200', 'flex', 'items-center', 'justify-center', 'text-slate-600', 'font-bold', 'text-xs'])>
                                        {{ strtoupper(substr($user->fullName, 0, 1)) }}
                                    </div>
                                    <div>
                                        <span @class(['font-medium', 'text-text'])>{{ $user->fullName }}</span>
                                        <div @class(['text-xs', 'text-secondary'])>{{ '@' . $user->username }}</div>
                                    </div>
                                </div>
                            </td>
                            <td @class(['px-6', 'py-4', 'text-secondary', 'text-sm'])>
                                {{ $user->email }}
                            </td>
                            <td @class(['px-6', 'py-4'])>
                                <div @class(['flex', 'gap-1', 'flex-wrap'])>
                                    @foreach($user->roles as $role)
                                        <span @class(['px-2.5', 'py-0.5', 'rounded-full', 'text-xs', 'font-medium', 
                                            'bg-blue-50 text-blue-700' => $role === 'user',
                                            'bg-purple-50 text-purple-700' => $role === 'admin'
                                        ])>
                                            {{ ucfirst($role) }}
                                        </span>
                                    @endforeach
                                </div>
                            </td>
                            <td @class(['px-6', 'py-4'])>
                                <div @class(['flex', 'items-center', 'justify-end', 'gap-2'])>
                                    <a href="{{ route('admin.users.edit', $user->id) }}" @class(['p-1.5', 'rounded-md', 'text-secondary', 'hover:bg-slate-100', 'hover:text-primary', 'transition-colors', 'block']) title="Edit Permissions">
                                        <svg @class(['w-4', 'h-4']) fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
                                        </svg>
                                    </a>
                                    
                                    @if(\App\Models\Auth::getUser()->id !== $user->id)
                                    <form action="{{ route('admin.users.delete', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');" @class(['inline-block'])>
                                        @csrf
                                        <button type="submit" @class(['p-1.5', 'rounded-md', 'text-secondary', 'hover:bg-red-50', 'hover:text-red-600', 'transition-colors']) title="Delete User">
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
            <h3 @class(['text-2xl', 'font-bold', 'text-text', 'mb-2'])>No users found</h3>
            <p @class(['text-secondary', 'mb-8'])>Get started by adding a new user.</p>
             <a href="{{ route('admin.users.create') }}" @class(['inline-flex', 'items-center', 'gap-2', 'px-6', 'py-3', 'bg-primary', 'text-white', 'rounded-xl', 'font-semibold', 'hover:bg-primary/90', 'transition-all', 'shadow-lg', 'shadow-primary/25'])>
                Add User
            </a>
        </div>
        @endif
    </div>
</x-layout>
