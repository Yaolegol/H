<div class="modules-pages-auth-common-components-tabs">
    <a
        class="
                modules-pages-auth-common-components-tabs__link
                {{
                    $activeLink === 'auth'
                    ? 'modules-pages-auth-common-components-tabs__link_active'
                    : ''
                }}
            "
        href="/login"
    >
        Вход
    </a>
    <a
        class="
                modules-pages-auth-common-components-tabs__link
                modules-pages-auth-common-components-tabs__link_with-offset
                {{
                    $activeLink === 'registration'
                    ? 'modules-pages-auth-common-components-tabs__link_active'
                    : ''
                }}
            "
        href="/register"
    >
        Регистрация
    </a>
</div>
