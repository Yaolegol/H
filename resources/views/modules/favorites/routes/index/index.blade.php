<div class="offers">
    @include('modules.favorites.routes.index.list.index', [
        'offersList' => $cardDataList,
        'withSeller' => true
    ])
</div>


