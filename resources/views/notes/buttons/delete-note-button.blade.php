<button class="p-2 bd-highlight fa-solid fa-trash" x-data=""
    x-on:click.prevent="$dispatch('open-modal', 'delete-note-{{ $note->id }}')"></button>

@include('notes.modals.delete-note-modal')
