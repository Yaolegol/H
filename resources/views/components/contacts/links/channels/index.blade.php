<div class="components-contacts-links-channels">
    <div class="components-contacts-links-channels__container">
        <a href="https://t.me/ferma101" rel="noopener noreferrer" target="_blank">
            @include('icons.messengers.telegram')
        </a>
    </div>
    <div class="components-contacts-links-channels__container">
        <a href="https://vk.com/ferma101" rel="noopener noreferrer" target="_blank">
            @include('icons.social.vk')
        </a>
    </div>
    <div class="components-contacts-links-channels__container">
        <a href="https://dzen.ru/101ferma" rel="noopener noreferrer" target="_blank">
            @include('icons.social.dzen', [
                'forWhiteBackground' => $forWhiteBackground ?? false,
            ])
        </a>
    </div>
    <div class="components-contacts-links-channels__container">
        <a href="https://ok.ru/group/70000004104678" rel="noopener noreferrer" target="_blank">
            @include('icons.social.ok')
        </a>
    </div>
</div>
