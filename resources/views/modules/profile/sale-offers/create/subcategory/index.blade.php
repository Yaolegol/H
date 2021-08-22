<div
    class="profile--sale-offers--create--subcategory j-profile--sale-offers--create--subcategory"
>
    @foreach($catalogSubCategoriesList as $subCategoryItem)
        <div
            class="profile--sale-offers--create--subcategory__subcategory-container"
            data-subcategory-id="{{$subCategoryItem['id']}}"
        >
            @php
                $subCategoryItemsList = array_map(function($subCategoryItem) {
                    return [
                        'id' => $subCategoryItem['id'],
                        'title' => $subCategoryItem['title'],
                        'value' => $subCategoryItem['id'],
                    ];
                }, $subCategoryItem['content']['categoriesList']);
            @endphp
            @include('components.inputs.radio.group.index', [
                        'dispatchEvents' => false,
                        'itemsList' => $subCategoryItemsList,
                        'name' => 'subcategory',
                    ])
        </div>
    @endforeach
</div>


