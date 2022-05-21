<div class="location-choose-infoBlock-block">
    @if(isset($locationSearchData['city']))
        @include('modules.common.location.components.choose.infoBlock.item.index', [
                'buttonText' => 'изменить',
                'title' => $locationSearchData['city']['title'],
            ])
    @elseif(isset($locationSearchData['region']))
        @include('modules.common.location.components.choose.infoBlock.item.index', [
               'buttonText' => 'изменить',
               'title' => $locationSearchData['region']['title'],
           ])
    @else
        @include('modules.common.location.components.choose.infoBlock.item.index', [
                'buttonText' => 'Выбрать',
                'title' => 'Все регионы',
            ])
    @endif
</div>


