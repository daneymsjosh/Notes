<button class="btn btn-primary" style="width: 100%" x-data=""
    x-on:click.prevent="$dispatch('open-modal', 'add-category')">
    <i class="fa-solid fa-plus me-2"></i>{{ __('Add Category') }}
</button>

@include('categories.modals.store-category-modal')
