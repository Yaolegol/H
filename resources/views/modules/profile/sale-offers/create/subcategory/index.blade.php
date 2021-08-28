<div
    class="profile--sale-offers--create--subcategory
    profile--sale-offers--create--subcategory_hidden
    j-profile--sale-offers--create--subcategory
    "
>
    <div class="profile--sale-offers--create--subcategory__title">Подкатегория:</div>
    <div class="profile--sale-offers--create--subcategory__content-container">
        @foreach($catalogSubCategoriesList as $subCategoryItem)
            <div
                class="profile--sale-offers--create--subcategory__subcategory-container
            j-profile--sale-offers--create--subcategory__subcategory-container"
                data-subcategory-id="{{$subCategoryItem['id']}}"
            >
                @php
                    $subCategoryItemsList = array_map(function($subCategoryItem) {
                        return [
                            'id' => $subCategoryItem['id'],
                            'title' => $subCategoryItem['title'],
                            'value' => $subCategoryItem['id'],
                        ];
                    }, $subCategoryItem['content']);
                @endphp
                @include('components.inputs.radio.group.index', [
                        'dispatchEvents' => false,
                        'itemsList' => $subCategoryItemsList,
                        'name' => 'catalog_level_two_id',
                    ])
            </div>
        @endforeach
    </div>
</div>


