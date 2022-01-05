<div
    class="favorites-components-button j-favorites-components-button"
    data-id="{{$id}}"
>
    <button class="favorites-components-button__button j-favorites-components-button__button">
        @include('icons.favorite')
    </button>
    @guest
        <div
            class="
                favorites-components-button__hint-block
                @isset($hintPosition)
                    {{$hintPosition === 'left' ?
                    'favorites-components-button__hint-block_left' :
                    ''
                    }}
                @endisset
            "
        >
            <div class="favorites-components-button__hint-title">Чтобы добавить товар в избранное нужно</div>
            <div class="favorites-components-button__hint-text-container">
                <a class="favorites-components-button__hint-link" href="/login">Войти</a>
            </div>
            <div class="favorites-components-button__hint-text-container">
                <div class="favorites-components-button__hint-text">или</div>
            </div>
            <div class="favorites-components-button__hint-text-container">
                <a class="favorites-components-button__hint-link" href="/register">Зарегистрироваться</a>
            </div>
        </div>
    @endguest
</div>
