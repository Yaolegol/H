<div class="offers">
    <h2 class="offers__title">Избранное</h2>
    @include('modules.pages.favorites.routes.index.list.index', [
        'offersList' => $cardDataList,
        'withSeller' => true
    ])
</div>


