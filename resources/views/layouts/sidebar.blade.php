<div class="list-group">
    <a href="#" class="list-group-item list-group-item-action active">
        {{ __('Recent') }}
    </a>
    <a href="#" class="list-group-item list-group-item-action">{{ __('Bookmarks') }}</a>
    <a href="#" class="list-group-item list-group-item-action">{{ __('Discover') }}</a>
    <div class="list-group-item">
        <h6 class="mb-1">{{ __('My library') }}</h6>
        <ul class="list-unstyled">
            <li>
                <a href="#" class="list-group-item-action">Category 1</a>
            </li>
            <li>
                <a href="#" class="list-group-item-action">Category 2</a>
            </li>
            <li>
                <a href="#" class="list-group-item-action">Category 3</a>
            </li>
        </ul>
    </div>
</div>
<div class="py-3 d-flex justify-center">
    <button class="btn btn-primary" style="width: 100%" x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'new-note')">
        <i class="fa-solid fa-plus me-2"></i>{{ __('New Category') }}
    </button>
</div>
