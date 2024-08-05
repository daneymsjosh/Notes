@if (!$note->pinned)
    <form action="{{ route('notes.favorite', $note) }}" method="post">
        @csrf
        <button class="btn btn-link p-0"><i class="fa-regular fa-star"></i></button>
    </form>
@else
    <form action="{{ route('notes.unfavorite', $note) }}" method="post">
        @csrf
        <button class="btn btn-link p-0"><i class="fa-solid fa-star"></i></button>
    </form>
@endif
