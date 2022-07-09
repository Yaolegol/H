<div class="modules-common-catalog-navigation">
    @foreach($catalog as $catalogItem)
        <div
            class="modules-common-catalog-navigation__item j-components-catalog-navigation-item j-components-search-catalog__navigation-item"
            data-item-id="{{ $loop->index }}"
            data-value="{{ $catalogItem['title'] }}"
        >
            @include($navigationItem, [
                'catalogItem' => $catalogItem,
            ])
        </div>
    @endforeach
</div>
