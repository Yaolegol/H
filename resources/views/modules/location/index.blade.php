<div class="location">
    <div>Регион поиска:</div>
    @if($locationSearch['city'] != null)
        <div class="location__info-container">
            @include('modules.location.info.index', [
                'buttonText' => 'Изменить',
                'title' => $locationSearch['city']['title'],
            ])
        </div>
    @elseif($locationSearch['region'] != null)
        <div class="location__info-container">
            @include('modules.location.info.index', [
                'buttonText' => 'Изменить',
                'title' => $locationSearch['region']['title'],
            ])
        </div>
    @else
        <div class="location__info-container">
            @include('modules.location.info.index', [
                'buttonText' => 'Выбрать',
                'title' => 'Не выбрано',
            ])
        </div>
    @endif
</div>


