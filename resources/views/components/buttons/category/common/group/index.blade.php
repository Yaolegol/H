<div class="components-buttons-category-common-group">
    @foreach($list as $item)
        <div class="components-buttons-category-common-group__item">
            @include('components.buttons.category.common.single.index', [
                'className' => $classNameButton,
                'id' => $item['value'],
                'title' => $item['title'],
            ])
        </div>
    @endforeach
</div>
