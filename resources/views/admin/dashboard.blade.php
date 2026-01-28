<x-layout>
    <div @class(['p-6'])>
        <div @class(['flex', 'flex-col', 'md:flex-row', 'md:items-center', 'md:justify-between', 'mb-8'])>
            <div>
                <h1 @class(['text-3xl', 'font-bold', 'text-text', 'mb-2'])>Admin Dashboard</h1>
                <p @class(['text-secondary'])>Welcome back! Here's an overview of your platform.</p>
            </div>
            <div @class(['mt-4', 'md:mt-0'])>
                <button @class(['px-4', 'py-2', 'bg-primary', 'text-white', 'rounded-lg', 'hover:bg-primary/90', 'transition-colors', 'shadow-lg', 'flex', 'items-center', 'gap-2'])>
                    <svg @class(['w-5', 'h-5']) fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-60H6"></path>
                    </svg>
                    <span>New Post</span>
                </button>
            </div>
        </div>

        <!-- Stats Grid -->
        <div @class(['grid', 'grid-cols-1', 'md:grid-cols-2', 'lg:grid-cols-4', 'gap-6', 'mb-8'])>
            <!-- Users Card -->
            <div @class(['bg-white', 'p-6', 'rounded-2xl', 'border', 'border-border', 'shadow-sm', 'hover:shadow-md', 'transition-shadow'])>
                <div @class(['flex', 'items-center', 'gap-4', 'mb-4'])>
                    <div @class(['w-12', 'h-12', 'rounded-xl', 'bg-blue-50', 'text-blue-600', 'flex', 'items-center', 'justify-center'])>
                        <svg @class(['w-6', 'h-6']) fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <p @class(['text-sm', 'font-medium', 'text-secondary'])>Total Users</p>
                        <h3 @class(['text-2xl', 'font-bold', 'text-text'])>{{ $stats['users'] }}</h3>
                    </div>
                </div>
                <div @class(['flex', 'items-center', 'text-sm', 'text-green-600'])>
                    <svg @class(['w-4', 'h-4', 'mr-1']) fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                    </svg>
                    <span>12.5% increase</span>
                </div>
            </div>

            <!-- Blogs Card -->
            <div @class(['bg-white', 'p-6', 'rounded-2xl', 'border', 'border-border', 'shadow-sm', 'hover:shadow-md', 'transition-shadow'])>
                <div @class(['flex', 'items-center', 'gap-4', 'mb-4'])>
                    <div @class(['w-12', 'h-12', 'rounded-xl', 'bg-purple-50', 'text-purple-600', 'flex', 'items-center', 'justify-center'])>
                        <svg @class(['w-6', 'h-6']) fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                    </div>
                    <div>
                        <p @class(['text-sm', 'font-medium', 'text-secondary'])>Total Blogs</p>
                        <h3 @class(['text-2xl', 'font-bold', 'text-text'])>{{ $stats['blogs'] }}</h3>
                    </div>
                </div>
                <div @class(['flex', 'items-center', 'text-sm', 'text-green-600'])>
                    <svg @class(['w-4', 'h-4', 'mr-1']) fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                    </svg>
                    <span>8.2% increase</span>
                </div>
            </div>

            <!-- Brands Card -->
            <div @class(['bg-white', 'p-6', 'rounded-2xl', 'border', 'border-border', 'shadow-sm', 'hover:shadow-md', 'transition-shadow'])>
                <div @class(['flex', 'items-center', 'gap-4', 'mb-4'])>
                    <div @class(['w-12', 'h-12', 'rounded-xl', 'bg-orange-50', 'text-orange-600', 'flex', 'items-center', 'justify-center'])>
                        <svg @class(['w-6', 'h-6']) fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <div>
                        <p @class(['text-sm', 'font-medium', 'text-secondary'])>Brands</p>
                        <h3 @class(['text-2xl', 'font-bold', 'text-text'])>{{ $stats['brands'] }}</h3>
                    </div>
                </div>
                <div @class(['flex', 'items-center', 'text-sm', 'text-secondary'])>
                    <span>No change this week</span>
                </div>
            </div>

            <!-- Roles Card -->
            <div @class(['bg-white', 'p-6', 'rounded-2xl', 'border', 'border-border', 'shadow-sm', 'hover:shadow-md', 'transition-shadow'])>
                <div @class(['flex', 'items-center', 'gap-4', 'mb-4'])>
                    <div @class(['w-12', 'h-12', 'rounded-xl', 'bg-green-50', 'text-green-600', 'flex', 'items-center', 'justify-center'])>
                        <svg @class(['w-6', 'h-6']) fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <div>
                        <p @class(['text-sm', 'font-medium', 'text-secondary'])>Active Roles</p>
                        <h3 @class(['text-2xl', 'font-bold', 'text-text'])>{{ $stats['roles'] }}</h3>
                    </div>
                </div>
                <div @class(['flex', 'items-center', 'text-sm', 'text-secondary'])>
                    <span>System configured</span>
                </div>
            </div>
        </div>

        <div @class(['grid', 'grid-cols-1', 'lg:grid-cols-3', 'gap-8'])>
            <!-- Recent Users -->
            <div @class(['lg:col-span-2', 'bg-white', 'rounded-2xl', 'border', 'border-border', 'shadow-sm', 'overflow-hidden'])>
                <div @class(['p-6', 'border-b', 'border-border', 'flex', 'justify-between', 'items-center'])>
                    <h2 @class(['text-xl', 'font-bold', 'text-text'])>Recent Users</h2>
                    <a href="#" @class(['text-primary', 'text-sm', 'font-medium', 'hover:underline'])>View All</a>
                </div>
                <div @class(['overflow-x-auto'])>
                    <table @class(['w-full', 'text-left'])>
                        <thead>
                            <tr @class(['bg-slate-50'])>
                                <th @class(['px-6', 'py-4', 'text-sm', 'font-semibold', 'text-secondary'])>User</th>
                                <th @class(['px-6', 'py-4', 'text-sm', 'font-semibold', 'text-secondary'])>Email</th>
                                <th @class(['px-6', 'py-4', 'text-sm', 'font-semibold', 'text-secondary'])>Joined</th>
                                <th @class(['px-6', 'py-4', 'text-sm', 'font-semibold', 'text-secondary'])>Status</th>
                            </tr>
                        </thead>
                        <tbody @class(['divide-y', 'divide-border'])>
                            @foreach($recentUsers as $user)
                            <tr @class(['hover:bg-slate-50/50', 'transition-colors'])>
                                <td @class(['px-6', 'py-4'])>
                                    <div @class(['flex', 'items-center', 'gap-3'])>
                                        <div @class(['w-8', 'h-8', 'rounded-full', 'bg-slate-200', 'flex', 'items-center', 'justify-center', 'text-slate-600', 'font-bold', 'text-xs'])>
                                            {{ strtoupper(substr($user->fullName, 0, 1)) }}
                                        </div>
                                        <span @class(['font-medium', 'text-text'])>{{ $user->fullName }}</span>
                                    </div>
                                </td>
                                <td @class(['px-6', 'py-4', 'text-secondary', 'text-sm'])>{{ $user->email }}</td>
                                <td @class(['px-6', 'py-4', 'text-secondary', 'text-sm'])>{{ \Carbon\Carbon::parse($user->created_at)->diffForHumans() }}</td>
                                <td @class(['px-6', 'py-4'])>
                                    <span @class(['px-2', 'py-1', 'bg-green-100', 'text-green-700', 'rounded-lg', 'text-xs', 'font-semibold'])>Active</span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>


                <!-- Platform Health -->
                <div @class(['bg-text', 'p-6', 'rounded-2xl', 'shadow-xl', 'text-white'])>
                    <h2 @class(['text-xl', 'font-bold', 'mb-4'])>Platform Health</h2>
                    <div @class(['space-y-4'])>
                        <div>
                            <div @class(['flex', 'justify-between', 'text-sm', 'mb-1'])>
                                <span @class(['text-slate-400'])>Storage</span>
                                <span @class(['text-white', 'font-medium'])>{{ $health['storage'] }}%</span>
                            </div>
                            <div @class(['w-full', 'bg-slate-700', 'rounded-full', 'h-1.5'])>
                                <div @class(['h-1.5', 'rounded-full', 'bg-primary' => $health['storage'] < 70, 'bg-orange-500' => $health['storage'] >= 70 && $health['storage'] < 90, 'bg-red-500' => $health['storage'] >= 90]) style="width: {{ $health['storage'] }}%"></div>
                            </div>
                        </div>
                        <div>
                            <div @class(['flex', 'justify-between', 'text-sm', 'mb-1'])>
                                <span @class(['text-slate-400'])>Database <span class="text-[10px]">({{ $health['dbSize'] }}MB)</span></span>
                                <span @class(['text-white', 'font-medium'])>{{ $health['database'] }}%</span>
                            </div>
                            <div @class(['w-full', 'bg-slate-700', 'rounded-full', 'h-1.5'])>
                                <div @class(['h-1.5', 'rounded-full', 'bg-green-500' => $health['database'] < 50, 'bg-orange-500' => $health['database'] >= 50 && $health['database'] < 80, 'bg-red-500' => $health['database'] >= 80]) style="width: {{ $health['database'] }}%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>