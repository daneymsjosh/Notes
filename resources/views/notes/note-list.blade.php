<div class="row">
    @forelse ($notes as $note)
        <div class="col-md-4 mb-3">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="card-title">{{ $note->title }}</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">
                        {{ $note->content }}
                    </p>
                </div>
                <div class="card-footer d-flex bd-highlight">
                    <small class="me-auto p-2 bd-highlight">{{ $note->updated_at->format('Y, M d') }}</small>
                    @if (!$note->pinned)
                        <form action="{{ route('notes.favorite', $note) }}" method="post">
                            @csrf
                            <button class="p-2 bd-highlight fa-regular fa-star"></button>
                        </form>
                    @else
                        <form action="{{ route('notes.unfavorite', $note) }}" method="post">
                            @csrf
                            <button class="p-2 bd-highlight fa-solid fa-star"></button>
                        </form>
                    @endif
                    @include('notes.buttons.edit-note-button')
                    @include('notes.buttons.delete-note-button')
                </div>
            </div>
        </div>
    @empty
        <p>No Notes Yet</p>
    @endforelse
</div>
