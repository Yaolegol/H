<div class="modules-pages-auth-common-components-layout-page">
    <div class="modules-pages-auth-common-components-layout-page__content-block">
        @include('modules.pages.auth.common.components.tabs.index', [
            'activeLink' => $activeLink
        ])
        <div class="modules-pages-auth-common-components-layout-page__content-container">
           {{$slot}}
        </div>
    </div>
</div>
