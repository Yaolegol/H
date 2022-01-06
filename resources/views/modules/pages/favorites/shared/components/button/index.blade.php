<div
    class="modules-pages-favorites-shared-components-button j-favorites-components-button"
    data-id="{{$id}}"
>
    <button class="modules-pages-favorites-shared-components-button__button j-favorites-components-button__button">
        @include('icons.favorite')
    </button>
    @guest
        <div
            class="
                modules-pages-favorites-shared-components-button__hint-block
                @isset($hintPosition)
                    {{$hintPosition === 'left' ?
                    'modules-pages-favorites-shared-components-button__hint-block_left' :
                    ''
                    }}
                @endisset
            "
        >
            <div class="modules-pages-favorites-shared-components-button__hint-title">Чтобы добавить товар в избранное нужно</div>
            <div class="modules-pages-favorites-shared-components-button__hint-text-container">
                <a class="modules-pages-favorites-shared-components-button__hint-link" href="/login">Войти</a>
            </div>
            <div class="modules-pages-favorites-shared-components-button__hint-text-container">
                <div class="modules-pages-favorites-shared-components-button__hint-text">или</div>
            </div>
            <div class="modules-pages-favorites-shared-components-button__hint-text-container">
                <a class="modules-pages-favorites-shared-components-button__hint-link" href="/register">Зарегистрироваться</a>
            </div>
        </div>
    @endguest
</div>
