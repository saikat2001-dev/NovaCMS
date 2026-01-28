<x-layout>
    <x-slot name="title">Create Your Brand - {{ config('app.name') }}</x-slot>

    <div @class(['flex', 'flex-col', 'items-center', 'justify-center', 'min-h-screen', 'pt-24', 'pb-12', 'px-4', 'sm:px-6', 'lg:px-8', 'bg-background'])>
        <div @class(['max-w-md', 'w-full', 'space-y-8', 'bg-white', 'p-8', 'md:p-10', 'rounded-3xl', 'shadow-2xl', 'border', 'border-gray-100'])>
            <div @class(['text-center'])>
                <div @class(['mx-auto', 'h-16', 'w-16', 'bg-primary/10', 'rounded-2xl', 'flex', 'items-center', 'justify-center', 'mb-6'])>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" @class(['w-8', 'h-8', 'text-primary'])>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.36m11.14 0H22.25m-14.625 0h6.75V9.75a.75.75 0 00-.75-.75h-5.25a.75.75 0 00-.75.75V21z" />
                    </svg>
                </div>
                <h2 @class(['text-3xl', 'font-bold', 'text-text', 'tracking-tight'])>
                    {{ isset($brand) ? 'Edit Brand' : 'Create your brand' }}
                </h2>
                <p @class(['mt-2', 'text-sm', 'text-secondary'])>
                    {{ isset($brand) ? 'Update your business identity' : "Let's set up your business identity" }}
                </p>
            </div>

            <form @class(['mt-8', 'space-y-6']) action="{{ isset($brand) ? route('brand.update', $brand->id) : route('brand.store') }}" method="POST">
                @csrf
                {{-- @method(isset($brand) ? 'PUT' : 'POST') --}}
                <div @class(['space-y-5'])>
                    <!-- Brand Name Input -->
                    <div>
                        <label for="name" @class(['block', 'text-sm', 'font-semibold', 'text-text', 'mb-2'])>Brand Name</label>
                        <input id="name" name="name" type="text" value="{{ old('name', $brand->name ?? '') }}" @class(['appearance-none', 'relative', 'block', 'w-full', 'px-4', 'py-3.5', 'border', 'border-gray-200' => !$errors->has('name'),
                        'border-red-500 focus:border-red-500 focus:ring-red-500/20' => $errors->has('name'), 'placeholder-gray-400', 'text-text', 'rounded-xl', 'focus:outline-none', 'focus:ring-2', 'focus:ring-primary/20', 'focus:border-primary', 'focus:z-10', 'sm:text-sm', 'transition-all', 'duration-200', 'bg-gray-50', 'focus:bg-white']) placeholder="e.g. Acme Corporation">
                        @error('name')
                            <p @class(['text-red-500', 'text-xs', 'mt-1'])>{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <button type="submit" @class(['group', 'relative', 'w-full', 'flex', 'justify-center', 'py-3.5', 'px-4', 'border', 'border-transparent', 'text-sm', 'font-bold', 'rounded-xl', 'text-white', 'bg-primary', 'hover:bg-indigo-700', 'focus:outline-none', 'focus:ring-2', 'focus:ring-offset-2', 'focus:ring-primary', 'transition-all', 'shadow-xl', 'hover:translate-y-px', 'hover:shadow-primary/20'])>
                        {{ isset($brand) ? 'Update Brand' : "Let's Get Started" }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
