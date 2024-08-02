<x-modal name="new-note" focusable>
    <form method="post" action="{{ route('notes.store') }}" class="p-6">
        @csrf
        <div class="px-6 py-4">
            <h2 class="text-lg font-medium text-dark-900 dark:text-dark-100">
                {{ __('Create New Note') }}
            </h2>
            <div class="mt-4">
                <label for="title" class="block text-sm font-medium">{{ __('Title') }}</label>
                <input id="title" name="title" type="text"
                    class="mt-1 block w-full rounded-md shadow-sm border-dark-300 dark:border-dark-600 dark:bg-dark-700 dark:text-dark-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
                @error('title')
                    <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-4">
                <label for="content" class="block text-sm font-medium">{{ __('Content') }}</label>
                <textarea id="content" name="content" rows="4"
                    class="mt-1 block w-full rounded-md shadow-sm border-dark-300 dark:border-dark-600 dark:bg-dark-700 dark:text-dark-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                @error('content')
                    <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-4">
                <label name="category" class="w-32 text-sm font-medium text-gray-900">Category</label>
                <select name="category_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    <option value="">All Notes</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-primary-button class="ms-3">
                {{ __('Create Note') }}
            </x-primary-button>
        </div>
    </form>
</x-modal>
