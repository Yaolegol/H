<div>
    @foreach($catalogList as $catalogItem)
        @include('modules.catalog.item.index', [ 'catalogItem' => $catalogItem ])
    @endforeach
</div>
