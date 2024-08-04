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
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h1 class="text-xl mb-0">{{ __('Note') }}</h1>
                        <div class="flex-grow-1 d-flex justify-content-center">
                            <form action="{{ route('dashboard') }}" method="get" class="d-flex">
                                <input value="{{ request('search', '') }}" name="search" class="form-control me-2"
                                    type="search" placeholder="Search" style="width: 300px;">
                                <button class="btn btn-secondary my-2 my-sm-0" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </form>
                        </div>
                        <div class="d-flex align-items-center">
                            <form action="{{ route('dashboard') }}" method="get"
                                class="d-flex me-5 align-items-center">
                                <select name = "sortField" value="{{ request('sortField', '') }}"
                                    style="-webkit-appearance: none; -moz-appearance: none; appearance: none; background: none; border: none; padding-right: 0;"
                                    class="text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-28 p-2.5">
                                    <option value="">Date Modified</option>
                                    <option value="">Title</option>
                                </select>
                                |
                                <button name="sortOrder" value="{{ request('sortOrder', '') }}" class="px-2"><i
                                        class="fa-solid fa-chevron-down"></i></button>
                            </form>
                            @include('notes.buttons.new-note-button')
                        </div>
                    </div>
                    @include('notes.note-list')
                </div>
            </div>
        </div>
</x-app-layout>
