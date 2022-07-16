<div class="modules-common-catalog j-modules-common-catalog j-components-search-catalog">
    <h2 class="modules-common-catalog__title">{{$title}}</h2>
    <div class="modules-common-catalog__catalog-search-container">
        @include('components.inputs.search.index')
    </div>
    <div class="modules-common-catalog__content-area j-modules-common-catalog__content-area">
        <div class="modules-common-catalog__navigation-block">
            @include('components.modals.layout.catalog.navigation.index')
        </div>
        <div class="modules-common-catalog__content-block">
            @include('components.modals.layout.catalog.content.index')
        </div>
    </div>
</div>
