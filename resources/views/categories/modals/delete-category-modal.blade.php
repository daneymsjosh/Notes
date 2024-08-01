@props(['category'])

<x-modal name="delete-category-{{ $category->id }}" focusable>
    <form method="post" action="{{ route('categories.destroy', $category->id) }}" class="p-6">
        @csrf
        @method('delete')

        <div class="px-6 py-4">
            <h2 class="text-lg font-medium text-dark-900 dark:text-dark-100">
                {{ __('Are you sure you want to delete this category?') }}
            </h2>
            <div class="mt-4">
                <label for="name" class="block text-sm font-medium">{{ __('Category Name') }}</label>
                <input id="name" name="name" type="text" value="{{ $category->name }}" disabled
                    class="mt-1 block w-full rounded-md shadow-sm border-dark-300 dark:border-dark-600 dark:bg-dark-700 dark:text-dark-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
                @error('name')
                    <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ms-3">
                {{ __('Delete Category') }}
            </x-danger-button>
        </div>
    </form>
</x-modal>
