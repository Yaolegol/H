<div class="location-choose-infoBlock-block">
    <div>Регион поиска:</div>
    @if($locationSearch['city'] != null)
        <div class="location-choose-infoBlock-block__info-container">
            @include('modules.common.location.components.choose.infoBlock.item.index', [
                'buttonText' => 'Изменить',
                'title' => $locationSearch['city']['title'],
            ])
        </div>
    @elseif($locationSearch['region'] != null)
        <div class="location-choose-infoBlock-block__info-container">
            @include('modules.common.location.components.choose.infoBlock.item.index', [
                'buttonText' => 'Изменить',
                'title' => $locationSearch['region']['title'],
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


