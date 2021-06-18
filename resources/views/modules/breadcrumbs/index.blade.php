<div>
    @foreach($breadcrumbs as $breadcrumbsItem)
        @include('modules.breadcrumbs.item.index', ['breadcrumbsItem' => $breadcrumbsItem])
    @endforeach
</div>


