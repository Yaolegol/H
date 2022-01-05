<div class="modules-pages-favorites-routes-index">
    <h2 class="modules-pages-favorites-routes-index__title">Избранное</h2>
    <div class="modules-pages-favorites-routes-index__list-container">
        @include('modules.pages.offers.shared.components.list.index', [
            'offersList' => $cardDataList,
            'withSeller' => true
        ])
    </div>
</div>


