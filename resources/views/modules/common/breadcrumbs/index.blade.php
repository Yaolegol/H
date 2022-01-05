<div class="breadcrumbs">
    @foreach($breadcrumbs as $breadcrumbsItem)
        @include('modules.breadcrumbs.item.index', [
            'breadcrumbsItem' => $breadcrumbsItem,
            'withArrow' => !$loop->last,
        ])
    @endforeach
</div>


