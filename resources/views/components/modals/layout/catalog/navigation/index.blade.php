<div class="modules-common-catalog-navigation">
    @foreach($catalog as $catalogItem)
        <div
            class="modules-common-catalog-navigation__item j-components-catalog-navigation-item"
            data-item-id="{{ $loop->index }}"
            data-item-value="{{ $catalogItem['title'] }}"
        >
            @include($navigationItem, [
                'catalogItem' => $catalogItem,
            ])
        </div>
    @endforeach
</div>
