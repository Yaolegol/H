<div class="offers">
    @include('modules.favorites.routes.index.list.index', [
        'offersList' => $offersList,
        'withSeller' => true
    ])
</div>


