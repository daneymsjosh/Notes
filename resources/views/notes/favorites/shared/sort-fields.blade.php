<form action="{{ route('favorites') }}" method="get" class="d-flex me-5 align-items-center">
    <input type="hidden" name="search" value="{{ request('search', '') }}">

    <select name="sortField" onchange="this.form.submit()"
        style="-webkit-appearance: none; -moz-appearance: none; appearance: none; background: none; border: none; padding-right: 0;"
        class="text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-28 p-2.5">
        <option value="updated_at" {{ request('sortField') == 'updated_at' ? 'selected' : '' }}>Date Modified
        </option>
        <option value="title" {{ request('sortField') == 'title' ? 'selected' : '' }}>Title
        </option>
    </select>

    <input type="hidden" name="sortOrder" value="{{ request('sortOrder', 'desc') }}">

    |
    <button type="submit" name="sortOrder" value="{{ request('sortOrder', 'desc') == 'desc' ? 'asc' : 'desc' }}"
        class="px-2">
        <i class="fa-solid fa-chevron-{{ request('sortOrder', 'desc') == 'desc' ? 'down' : 'up' }}"></i>
    </button>
</form>
