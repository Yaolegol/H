<div class="offers">
    @include('modules.breadcrumbs.index')
    <div class="offers__location-container">
        @include('modules.location.components.choose.infoBlock.block.index')
    </div>
    @include('modules.offers.list.index', [
        'offersList' => $offersPaginatedData['data'],
        'withSeller' => true
    ])
</div>


