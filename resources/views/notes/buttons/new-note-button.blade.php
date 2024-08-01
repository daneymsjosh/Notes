<button class="btn btn-primary" x-data="" x-on:click.prevent="$dispatch('open-modal', 'new-note')">
    <i class="fa-solid fa-plus me-2"></i>{{ __('New Note') }}
</button>

@include('notes.modals.store-note-modal')
