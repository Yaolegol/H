<div class="components-rating-common-get">
    <div class="components-rating-common-get__star-container">
        <div class="components-rating-common-get__star-container-default"></div>
        <div class="components-rating-common-get__star-container-active" style="width: {{20 * (int) $rating ?? 0}}px"></div>
    </div>
    @if(($votes ?? 0) > 0 )
        <div class="components-rating-common-get__votes-container">{{$votes}} {{custom_plural_ru($votes, ['оценка', 'оценки', 'оценок'])}}</div>
    @endif
</div>
