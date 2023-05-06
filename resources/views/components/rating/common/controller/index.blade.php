<form
    action="{{$isUpdate ?? false ? '/offer/rating/' . $offerId  : '/offer/rating'}}"
    class="components-rating-common-controller j-components-rating-common-controller"
    @if($isUpdate ?? false)
        data-update
    @endif
>
    @csrf

    <input name="offer_id" type="hidden" value="{{$offerId}}">

    <div class="j-components-rating-common-controller__content">
        {{$slot}}
    </div>
    <div class="j-components-rating-common-controller__success">
        Спасибо! Ваш отзыв отправлен!
    </div>
</form>
