<div
    class="components-info-common {{$className ?? ''}} hidden j-components-info-common"
    data-id="{{$id ?? ''}}"
>
    <div class="components-info-common__text">{!! ($text ?? '') !!}</div>
    <button
        class="components-info-common__button j-components-info-common__close-button"
        type="button"
    >Больше не показывать</button>
</div>
