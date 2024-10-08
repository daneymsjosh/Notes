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
                        <h1 class="text-xl mb-0">{{ __('Note') }}</h1>
                        <div class="flex-grow-1 d-flex justify-content-center">
                            @include('shared.search-box')
                        </div>
                        <div class="d-flex align-items-center">
                            @include('shared.sort-fields')
                            @include('notes.buttons.new-note-button')
                        </div>
                    </div>
                    @include('notes.note-list')
                </div>
            </div>
        </div>
</x-app-layout>
