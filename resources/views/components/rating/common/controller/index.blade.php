<form
    action="{{$isUpdate ?? false ? '/offer/rating/' . $offerId  : '/offer/rating'}}"
    class="components-rating-common-controller j-components-rating-common-controller"
    @if($isUpdate ?? false)
        data-update
    @endif
>
    @csrf

    <input name="offer_id" type="hidden" value="{{$offerId}}">
    {{$slot}}
</form>
