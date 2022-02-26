<div class="location-choose-infoBlock-block">
    <div>Регион поиска:</div>
    @if($locationSearchData['city'] != null)
        <div class="location-choose-infoBlock-block__info-container">
            @include('modules.common.location.components.choose.infoBlock.item.index', [
                'buttonText' => 'Изменить',
                'title' => $locationSearchData['city']['title'],
            ])
        </div>
    @elseif($locationSearchData['region'] != null)
        <div class="location-choose-infoBlock-block__info-container">
            @include('modules.common.location.components.choose.infoBlock.item.index', [
                'buttonText' => 'Изменить',
                'title' => $locationSearchData['region']['title'],
            ])
        </div>
    @else
        <div class="location-choose-infoBlock-block__info-container">
            @include('modules.common.location.components.choose.infoBlock.item.index', [
                'buttonText' => 'Выбрать',
                'title' => 'Все регионы',
            ])
        </div>
    @endif
</div>


