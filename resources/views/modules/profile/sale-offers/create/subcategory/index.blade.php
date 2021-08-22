<div
    class="profile--sale-offers--create--subcategory j-profile--sale-offers--create--subcategory"
>
    @foreach($catalogSubCategoriesList as $subCategoryItem)
        <div
            class="profile--sale-offers--create--subcategory__subcategory-container"
            data-subcategory-id="{{$subCategoryItem['id']}}"
        >
            @foreach($subCategoryItem['content']['categoriesList'] as $categoriesListItem)
                <div>{{$categoriesListItem['title']}}</div>
            @endforeach
        </div>
    @endforeach
</div>


