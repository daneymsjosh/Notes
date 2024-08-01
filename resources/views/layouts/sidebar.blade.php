<div class="list-group">
    <a href="#" class="list-group-item list-group-item-action active">
        {{ __('All Notes') }}
    </a>
    <a href="#" class="list-group-item list-group-item-action">{{ __('Favorites') }}</a>
    <div class="list-group-item">
        <h6 class="mb-1">{{ __('My library') }}</h6>
        <ul class="list-unstyled">
            @foreach ($categories as $category)
                <li>
                    <div class="d-flex bd-highlight">
                        <a href="#" class="list-group-item-action text-md mt-1">{{ $category->name }}</a>
                        @include('categories.buttons.edit-category-button')
                        @include('categories.buttons.delete-category-button')
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
<div class="py-3 d-flex justify-center">
    @include('categories.buttons.store-category-button')
</div>
