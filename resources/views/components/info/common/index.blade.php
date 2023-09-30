<div
    class="components-info-common {{$className ?? ''}} hidden j-components-info-common"
    data-id="{{$id ?? ''}}"
>
    <div class="components-info-common__text">{!! ($text ?? '') !!}</div>
    <div class="components-info-common__message-area">
        <div class="components-info-common__contacts-messenger-container">
            <a href="" rel="noopener noreferrer" target="_blank">
                @include('icons.social.vk')
            </a>
        </div>
        <div class="components-info-common__contacts-messenger-container">
            <a href="" rel="noopener noreferrer" target="_blank">
                @include('icons.social.ok')
            </a>
        </div>
        <div class="components-info-common__contacts-messenger-container">
            <a href="https://t.me/Clickferma" rel="noopener noreferrer" target="_blank">
                @include('icons.messengers.telegram')
            </a>
        </div>
        <div class="components-info-common__contacts-messenger-container">
            <a href="https://wa.me/+79539117514" rel="noopener noreferrer" target="_blank">
                @include('icons.messengers.whatsapp')
            </a>
        </div>
        <div class="components-info-common__contacts-messenger-container">
            <a href="viber://chat?number=%2B79539117514" rel="noopener noreferrer" target="_blank">
                @include('icons.messengers.viber')
            </a>
        </div>
    </div>
    <button
        class="components-info-common__button j-components-info-common__close-button"
        type="button"
    >Больше не показывать</button>
</div>
