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
    <div class="j-components-rating-common-controller__success hidden">
        Спасибо! Ваш отзыв отправлен!
    </div>
    <div class="j-components-rating-common-controller__error hidden">
        Что-то пошло не так! Попробуйте позже - мы уже работаем над исправлением ошибки!
    </div>
</form>
