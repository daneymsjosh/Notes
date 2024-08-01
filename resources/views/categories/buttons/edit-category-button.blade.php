<button class="p-2 bd-highlight fa-solid fa-pen" x-data=""
    x-on:click.prevent="$dispatch('open-modal', 'edit-category-{{ $category->id }}')"></button>

@include('categories.modals.edit-category-modal')
