<div class="modules-pages-admin-routes-offers">
    @foreach($notApprovedList as $notApprovedItem)
        @component('components.admin.listItem.index')
            @include('components.admin.cards.offer.index')
        @endcomponent
    @endforeach()
</div>


