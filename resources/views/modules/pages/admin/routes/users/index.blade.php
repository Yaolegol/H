<div class="modules-pages-admin-routes-users">
    @foreach($notApprovedList as $notApprovedListItem)
        @component('components.admin.listItem.index')
            @include('components.admin.cards.user.index')
        @endcomponent
    @endforeach()
</div>


