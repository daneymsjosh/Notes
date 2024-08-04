<form action="{{ route('dashboard') }}" method="get" class="d-flex">
    <input value="{{ request('search', '') }}" name="search" class="form-control me-2" type="search" placeholder="Search"
        style="width: 300px;">
    <button class="btn btn-secondary my-2 my-sm-0" type="submit">
        <i class="fa fa-search"></i>
    </button>
</form>
