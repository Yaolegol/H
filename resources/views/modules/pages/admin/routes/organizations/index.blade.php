<div class="modules-pages-admin-routes-organizations">
    @foreach($notApprovedList as $notApprovedListItem)
        @component('components.admin.listItem.index')
            @include('components.admin.cards.organization.index')
        @endcomponent
    @endforeach()
</div>


