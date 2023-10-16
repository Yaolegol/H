<div class="components-buttons-category-common-group">
    @foreach($list as $item)
        <div class="components-buttons-category-common-group__item j-modules-pages-profile-routes-sale-offers-common-categories-controller__item">
            <span class="components-buttons-category-common-group__item-arrow"></span>
            @include('components.buttons.category.common.single.index', [
                'className' => $classNameButton,
                'id' => $item['value'],
                'isChecked' => $item['isChecked'] ?? false,
                'title' => $item['title'],
            ])
        </div>
    @endforeach
</div>
