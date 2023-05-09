<div class="modules-pages-admin-routes-offers-rating">
    @foreach($notApprovedList as $notApprovedItem)
        @component('components.admin.listItem.index')
            @include('components.admin.cards.offerRating.index')
        @endcomponent
    @endforeach()
</div>


