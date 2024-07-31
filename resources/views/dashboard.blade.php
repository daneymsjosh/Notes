<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="container">
            <div class="row">
                <!-- Sidebar -->
                <div class="col-md-3">
                    @include('layouts.sidebar')
                </div>

                <!-- Notes Grid -->
                <div class="col-md-9">
                    <div class="d-flex justify-content-between mb-3">
                        <h3 class="mb-0">{{ __('Notes') }}</h3>
                        <button class="btn btn-primary" x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'new-note')">
                            {{ __('New Note') }}
                        </button>
                    </div>

                    <x-modal name="new-note" focusable>
                        <form method="post" action="{{ route('notes.store') }}" class="p-6">
                            @csrf
                            <div class="px-6 py-4">
                                <div class="text-lg font-medium">
                                    {{ __('Create New Note') }}</div>
                                <div class="mt-4">
                                    <label for="title" class="block text-sm font-medium">{{ __('Title') }}</label>
                                    <input id="title" name="title" type="text"
                                        class="mt-1 block w-full rounded-md shadow-sm border-dark-300 dark:border-dark-600 dark:bg-dark-700 dark:text-dark-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    @error('title')
                                        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mt-4">
                                    <label for="content" class="block text-sm font-medium">{{ __('Content') }}</label>
                                    <textarea id="content" name="content" rows="4"
                                        class="mt-1 block w-full rounded-md shadow-sm border-dark-300 dark:border-dark-600 dark:bg-dark-700 dark:text-dark-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                                    @error('content')
                                        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mt-6 flex justify-end">
                                <x-secondary-button x-on:click="$dispatch('close')">
                                    {{ __('Cancel') }}
                                </x-secondary-button>

                                <x-primary-button class="ms-3">
                                    {{ __('Sumbit') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </x-modal>

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
                                        <small
                                            class="me-auto p-2 bd-highlight">{{ $note->updated_at->format('Y, M d') }}</small>
                                        <button class="p-2 bd-highlight fa-solid fa-thumbtack"></button>
                                        <button class="p-2 bd-highlight fa-solid fa-pen"></button>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p>No Notes Yet</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
