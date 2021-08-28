<div
    class="profile--sale-offers--create--subcategory
    profile--sale-offers--create--subcategory_hidden
    j-profile--sale-offers--create--city
    "
>
    <div class="profile--sale-offers--create--subcategory__title">Подкатегория:</div>
    <div class="profile--sale-offers--create--subcategory__content-container">
        @foreach($catalogSubCategoriesList as $subCategoryItem)
            <div
                class="profile--sale-offers--create--subcategory__subcategory-container
            j-profile--sale-offers--create--city__city-container"
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
                        'name' => 'city_id',
                    ])
            </div>
        @endforeach
    </div>
</div>


