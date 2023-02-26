<div class="modules-pages-admin-routes-sale-points">
    @foreach($notApprovedList as $notApprovedListItem)
        @component('components.admin.listItem.index')
            @include('components.admin.cards.salePoint.index')
        @endcomponent
    @endforeach()
</div>


