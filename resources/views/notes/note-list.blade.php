<div class="row">
    @forelse ($notes as $note)
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm h-100">
                <a href="{{ route('notes.show', $note->id) }}" class="text-decoration-none text-dark">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-lg mb-2 fw-bold">{{ $note->title }}</h5>
                        <p class="card-text flex-grow-1"
                            style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; height: calc(1.5em * 3); line-height: 1.5em;">
                            {{ $note->content }}
                        </p>
                    </div>
                </a>
                <div class="card-footer d-flex justify-content-between align-items-center">
                    <small class="text-muted">{{ $note->updated_at->format('Y, M d') }}</small>
                    <div class="d-flex align-items-center">
                        @include('notes.buttons.favorites-button')
                        @include('notes.buttons.edit-note-button')
                        @include('notes.buttons.delete-note-button')
                    </div>
                </div>
            </div>
        </div>
    @empty
        <p>No Notes Yet</p>
    @endforelse
</div>
