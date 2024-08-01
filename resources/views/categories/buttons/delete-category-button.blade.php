<button class="p-2 bd-highlight fa-solid fa-trash" x-data=""
    x-on:click.prevent="$dispatch('open-modal', 'delete-category-{{ $category->id }}')"></button>

@include('categories.modals.delete-category-modal')
