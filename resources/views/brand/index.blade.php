<x-layout>
    <x-slot name="title">Brands - {{ config('app.name') }}</x-slot>

    <div @class(['p-6'])>
        <!-- Header -->
        <div @class(['flex', 'flex-col', 'md:flex-row', 'md:items-center', 'md:justify-between', 'mb-8'])>
            <div>
                <h1 @class(['text-3xl', 'font-bold', 'text-text', 'mb-2'])>Brands</h1>
                <p @class(['text-secondary'])>Manage all your brands from one place.</p>
            </div>
            <div @class(['mt-4', 'md:mt-0', 'flex', 'items-center', 'gap-3'])>
                <div @class(['relative'])>
                    <input type="text" placeholder="Search brands..." @class(['pl-10', 'pr-4', 'py-2.5', 'bg-white', 'border', 'border-border', 'rounded-xl', 'text-sm', 'focus:outline-none', 'focus:ring-2', 'focus:ring-primary/20', 'focus:border-primary', 'w-64', 'transition-all'])>
                    <svg @class(['w-5', 'h-5', 'text-secondary', 'absolute', 'left-3', 'top-1/2', '-translate-y-1/2']) fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <a href="{{ route('brand.create') }}" @class(['px-5', 'py-2.5', 'bg-primary', 'text-white', 'rounded-xl', 'hover:bg-primary/90', 'transition-all', 'shadow-lg', 'shadow-primary/25', 'flex', 'items-center', 'gap-2', 'font-semibold', 'text-sm'])>
                    <svg @class(['w-5', 'h-5']) fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    <span>Create Brand</span>
                </a>
            </div>
        </div>

        <!-- Stats Cards -->
        <div @class(['grid', 'grid-cols-1', 'md:grid-cols-3', 'gap-6', 'mb-8'])>
            <div @class(['bg-gradient-to-br', 'from-primary', 'to-indigo-600', 'p-6', 'rounded-2xl', 'text-white', 'shadow-xl', 'shadow-primary/20'])>
                <div @class(['flex', 'items-center', 'justify-between'])>
                    <div>
                        <p @class(['text-white/80', 'text-sm', 'font-medium'])>Total Brands</p>
                        <h3 @class(['text-3xl', 'font-bold', 'mt-1'])>{{ $brands->count() }}</h3>
                    </div>
                    <div @class(['w-12', 'h-12', 'bg-white/20', 'rounded-xl', 'flex', 'items-center', 'justify-center'])>
                        <svg @class(['w-6', 'h-6']) fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                </div>
            </div>
            <div @class(['bg-white', 'p-6', 'rounded-2xl', 'border', 'border-border', 'shadow-sm'])>
                <div @class(['flex', 'items-center', 'justify-between'])>
                    <div>
                        <p @class(['text-secondary', 'text-sm', 'font-medium'])>Active Brands</p>
                        <h3 @class(['text-3xl', 'font-bold', 'text-text', 'mt-1'])>{{ $brands->count() }}</h3>
                    </div>
                    <div @class(['w-12', 'h-12', 'bg-green-50', 'text-green-600', 'rounded-xl', 'flex', 'items-center', 'justify-center'])>
                        <svg @class(['w-6', 'h-6']) fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>
            <div @class(['bg-white', 'p-6', 'rounded-2xl', 'border', 'border-border', 'shadow-sm'])>
                <div @class(['flex', 'items-center', 'justify-between'])>
                    <div>
                        <p @class(['text-secondary', 'text-sm', 'font-medium'])>This Month</p>
                        <h3 @class(['text-3xl', 'font-bold', 'text-text', 'mt-1'])>{{ $brands->where('created_at', '>=', now()->startOfMonth())->count() }}</h3>
                    </div>
                    <div @class(['w-12', 'h-12', 'bg-blue-50', 'text-blue-600', 'rounded-xl', 'flex', 'items-center', 'justify-center'])>
                        <svg @class(['w-6', 'h-6']) fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Brands Table -->
        @if($brands->count() > 0)
        <div @class(['bg-white', 'rounded-2xl', 'border', 'border-border', 'shadow-sm', 'overflow-hidden'])>
            <div @class(['p-6', 'border-b', 'border-border', 'flex', 'items-center', 'justify-between'])>
                <h2 @class(['text-xl', 'font-bold', 'text-text'])>All Brands</h2>
                <span @class(['text-sm', 'text-secondary'])>{{ $brands->count() }} {{ Str::plural('brand', $brands->count()) }}</span>
            </div>
            <div @class(['overflow-x-auto'])>
                <table @class(['w-full', 'text-left'])>
                    <thead>
                        <tr @class(['bg-slate-50'])>
                            <th @class(['px-6', 'py-4', 'text-sm', 'font-semibold', 'text-secondary'])>Brand</th>
                            <th @class(['px-6', 'py-4', 'text-sm', 'font-semibold', 'text-secondary'])>ID</th>
                            <th @class(['px-6', 'py-4', 'text-sm', 'font-semibold', 'text-secondary'])>Status</th>
                            <th @class(['px-6', 'py-4', 'text-sm', 'font-semibold', 'text-secondary'])>Created</th>
                            <th @class(['px-6', 'py-4', 'text-sm', 'font-semibold', 'text-secondary', 'text-right'])>Actions</th>
                        </tr>
                    </thead>
                    <tbody @class(['divide-y', 'divide-border'])>
                        @foreach($brands as $brand)
                        <tr @class(['hover:bg-slate-50/50', 'transition-colors', 'group'])>
                            <td @class(['px-6', 'py-4'])>
                                <div @class(['flex', 'items-center', 'gap-3'])>
                                    <div @class(['w-8', 'h-8', 'rounded-full', 'bg-slate-200', 'flex', 'items-center', 'justify-center', 'text-slate-600', 'font-bold', 'text-xs'])>
                                        {{ strtoupper(substr($brand->name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <span @class(['font-medium', 'text-text'])>{{ $brand->name }}</span>
                                    </div>
                                </div>
                            </td>
                            <td @class(['px-6', 'py-4', 'text-secondary', 'text-sm'])>
                                #{{ $brand->id }}
                            </td>
                            <td @class(['px-6', 'py-4'])>
                                <span @class(['px-2', 'py-1', 'bg-green-100', 'text-green-700', 'rounded-lg', 'text-xs', 'font-semibold'])>Active</span>
                            </td>
                            <td @class(['px-6', 'py-4', 'text-secondary', 'text-sm'])>
                                {{ \Carbon\Carbon::parse($brand->created_at)->format('M d, Y') }}
                            </td>
                            <td @class(['px-6', 'py-4'])>
                                <div @class(['flex', 'items-center', 'justify-end', 'gap-2'])>
                                    <button @class(['p-1.5', 'rounded-md', 'text-secondary', 'hover:bg-slate-100', 'hover:text-primary', 'transition-colors']) title="Edit">
                                        <svg @class(['w-4', 'h-4']) fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                    </button>
                                    <button @class(['p-1.5', 'rounded-md', 'text-secondary', 'hover:bg-red-50', 'hover:text-red-600', 'transition-colors']) title="Delete">
                                        <svg @class(['w-4', 'h-4']) fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @else
        <!-- Empty State -->
        <div @class(['bg-white', 'rounded-2xl', 'border', 'border-border', 'p-16', 'text-center'])>
            <div @class(['w-20', 'h-20', 'mx-auto', 'mb-6', 'bg-gradient-to-br', 'from-primary/10', 'to-indigo-100', 'rounded-2xl', 'flex', 'items-center', 'justify-center'])>
                <svg @class(['w-10', 'h-10', 'text-primary']) fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                </svg>
            </div>
            <h3 @class(['text-2xl', 'font-bold', 'text-text', 'mb-2'])>No brands yet</h3>
            <p @class(['text-secondary', 'mb-8', 'max-w-sm', 'mx-auto'])>Get started by creating your first brand to organize and manage your content.</p>
            <a href="{{ route('brand.create') }}" @class(['inline-flex', 'items-center', 'gap-2', 'px-6', 'py-3', 'bg-primary', 'text-white', 'rounded-xl', 'font-semibold', 'hover:bg-primary/90', 'transition-all', 'shadow-lg', 'shadow-primary/25'])>
                <svg @class(['w-5', 'h-5']) fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Create Your First Brand
            </a>
        </div>
        @endif
    </div>
</x-layout>
