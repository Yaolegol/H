<div class="modules-pages-admin-routes-index">
    @foreach($offersNotApprovedList as $offersNotApprovedItem)
        @component('components.admin.listItem.index')
            @include('components.admin.cards.offer.index')
        @endcomponent
    @endforeach()
</div>


