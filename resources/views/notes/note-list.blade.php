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
                    <button class="p-2 bd-highlight fa-solid fa-thumbtack"></button>
                    <button class="p-2 bd-highlight fa-solid fa-pen"></button>
                </div>
            </div>
        </div>
    @empty
        <p>No Notes Yet</p>
    @endforelse
</div>
