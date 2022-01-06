<div class="modules-pages-offers-shared-components-list">
    @foreach($offersList as $offerItem)
        <div class="modules-pages-offers-shared-components-list__item-container">
            @include('modules.pages.offers.shared.components.item.index', [
                'offer' => $offerItem,
                'withSeller' => $withSeller ?? false,
            ])
        </div>
    @endforeach
</div>


