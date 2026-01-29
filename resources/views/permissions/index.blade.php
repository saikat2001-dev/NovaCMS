<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Permissions</title>
</head>
<body>
    <x-layout>
        <x-slot name="title">Permission Management - {{ config('app.name') }}</x-slot>

        <div @class(['p-6'])>
            <!-- Header -->
            <div @class(['flex', 'flex-col', 'md:flex-row', 'md:items-center', 'md:justify-between', 'mb-8'])>
                <div>
                    <h1 @class(['text-3xl', 'font-bold', 'text-text', 'mb-2'])>Permission Management</h1>
                    <p @class(['text-secondary'])>Manage permissions for roles and users.</p>
                </div>
                <div @class(['mt-4', 'md:mt-0'])>
                    <a href="{{ route('admin.permissions.create') }}" @class(['px-5', 'py-2.5', 'bg-primary', 'text-white', 'rounded-xl', 'hover:bg-primary/90', 'transition-all', 'shadow-lg', 'shadow-primary/25', 'flex', 'items-center', 'gap-2', 'font-semibold', 'text-sm'])>
                        <svg @class(['w-5', 'h-5']) fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        <span>Create Permission</span>
                    </a>
                </div>
            </div>

            <!-- Permissions Table -->
            @if($permissions->count() > 0)
            <div @class(['bg-white', 'rounded-2xl', 'border', 'border-border', 'shadow-sm', 'overflow-hidden'])>
                <div @class(['overflow-x-auto'])>
                    <table @class(['w-full', 'text-left'])>
                        <thead>
                            <tr @class(['bg-slate-50'])>
                                <th @class(['px-6', 'py-4', 'text-sm', 'font-semibold', 'text-secondary'])>Permission Name</th>
                                <th @class(['px-6', 'py-4', 'text-sm', 'font-semibold', 'text-secondary', 'text-right'])>Actions</th>
                            </tr>
                        </thead>
                        <tbody @class(['divide-y', 'divide-border'])>
                            @foreach($permissions as $permission)
                            <tr @class(['hover:bg-slate-50/50', 'transition-colors', 'group'])>
                                <td @class(['px-6', 'py-4'])>
                                    <span @class(['font-medium', 'text-text'])>{{ $permission->title }}</span>
                                </td>
                                <td @class(['px-6', 'py-4'])>
                                    <div @class(['flex', 'items-center', 'justify-end', 'gap-2'])>
                                        <form action="{{ route('admin.permissions.destroy', $permission->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this permission?');" @class(['inline-block'])>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" @class(['p-1.5', 'rounded-md', 'text-secondary', 'hover:bg-red-50', 'hover:text-red-600', 'transition-colors']) title="Delete Permission">
                                                <svg @class(['w-4', 'h-4']) fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            </button>
                                        </form>
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
                <h3 @class(['text-2xl', 'font-bold', 'text-text', 'mb-2'])>No permissions found</h3>
                <p @class(['text-secondary', 'mb-8'])>Create a permission to get started.</p>
                 <a href="{{ route('admin.permissions.create') }}" @class(['inline-flex', 'items-center', 'gap-2', 'px-6', 'py-3', 'bg-primary', 'text-white', 'rounded-xl', 'font-semibold', 'hover:bg-primary/90', 'transition-all', 'shadow-lg', 'shadow-primary/25'])>
                    Create Permission
                </a>
            </div>
            @endif
        </div>
    </x-layout>
</body>
</html>