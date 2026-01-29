<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Permission - {{ config('app.name') }}</title>
</head>
<body>
    <x-layout>
        <x-slot name="title">Create Permission - {{ config('app.name') }}</x-slot>

        <div @class(['p-6'])>
            <div @class(['flex', 'flex-col', 'md:flex-row', 'md:items-center', 'md:justify-between', 'mb-8'])>
                <div>
                    <h1 @class(['text-3xl', 'font-bold', 'text-text', 'mb-2'])>Create Permission</h1>
                    <p @class(['text-secondary'])>Add a new permission to the system.</p>
                </div>
            </div>

            <div @class(['bg-white', 'rounded-2xl', 'border', 'border-border', 'p-8', 'shadow-sm'])>
                @if ($errors->any())
                    <div @class(['mb-4', 'text-red-600', 'text-sm'])>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.permissions.store') }}" method="POST">
                    @csrf
                    <div @class(['mb-4'])>
                        <label for="title" @class(['block', 'text-sm', 'font-medium', 'text-text', 'mb-2'])>Permission Name</label>
                        <input type="text" id="title" name="title" @class(['w-full', 'px-4', 'py-2', 'border', 'border-border', 'rounded-lg', 'focus:ring-primary', 'focus:border-primary']) required>
                    </div>

                    <div @class(['flex', 'justify-end', 'mt-6'])>
                        <button type="submit" @class(['px-6', 'py-3', 'bg-primary', 'text-white', 'rounded-xl', 'font-semibold', 'hover:bg-primary/90', 'transition-all', 'shadow-lg', 'shadow-primary/25'])>
                            Create Permission
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </x-layout>
</body>
</html>