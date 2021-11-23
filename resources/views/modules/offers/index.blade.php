<div class="offers">
    @include('modules.breadcrumbs.index')
    <div class="offers__location-container">
        @include('modules.location.index')
    </div>
    @include('modules.offers.list.index', [
        'offersList' => $offersList,
        'withSeller' => true
    ])
</div>


