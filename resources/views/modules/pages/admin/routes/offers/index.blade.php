<div class="modules-pages-admin-routes-offers">
    @foreach($offersNotApprovedList as $offersNotApprovedItem)
        @component('components.admin.listItem.index')
            @include('components.admin.cards.offer.index')
        @endcomponent
    @endforeach()
</div>


