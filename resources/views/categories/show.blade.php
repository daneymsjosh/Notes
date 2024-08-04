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
                        <h1 class="text-xl mb-0">{{ $currentCategory->name }}</h1>
                        @include('notes.buttons.new-note-button')
                    </div>
                    @include('notes.note-list')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
