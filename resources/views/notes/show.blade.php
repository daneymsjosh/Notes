<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="container-fluid">
            <div class="row">
                <!-- Sidebar -->
                <div class="col-md-2">
                    @include('layouts.sidebar')
                </div>

                <!-- Notes Grid -->
                <div class="col-md-10">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        @include('notes.buttons.back-button')
                    </div>
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title text-xl mb-3 fw-bold">{{ $note->title }}</h3>
                                @if ($note->pinned)
                                    <p style="color: red;"><i class="fa-solid fa-star px-1"></i>Favorited</p>
                                @endif
                            </div>
                            <p class="card-text mb-4">{{ $note->content }}</p>
                            <small class="text-muted">{{ $note->updated_at->format('Y, M d') }}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
