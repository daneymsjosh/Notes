<button class="p-2 bd-highlight fa-solid fa-pen" x-data=""
    x-on:click.prevent="$dispatch('open-modal', 'edit-note-{{ $note->id }}')"></button>

@include('notes.modals.edit-note-modal', ['note' => $note])
