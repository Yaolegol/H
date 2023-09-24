<div class="modules-pages-profile-routes-organization-info-index">
    @component('modules.pages.profile.common.components.header.index', ['activeTab' => 'organization-info'])
        @component('modules.pages.profile.common.components.body.index.index', [
                'createLink' => '/profile/organization-info/create',
                'createTitle' => 'Добавить организацию',
                'title' => 'Ваши организации'
            ])
            @if(count($organizationList) > 0)
                @foreach ($organizationList as $organizationItem)
                    @component('modules.pages.profile.common.components.container.card.index')
                        @include('components.cards.organization.index', [
                                        'organization' => $organizationItem,
                                    ])
                    @endcomponent
                @endforeach
            @else
                <div class="modules-pages-profile-routes-organization-info-index__empty-block">
                    <div>У Вас пока не добавлено организаций</div>
                    <div class="modules-pages-profile-routes-organization-info-index__empty-container">Чтобы добавить организацию, нажмите
                        <a
                            class="modules-pages-profile-routes-organization-info-index__empty-link"
                            href="/profile/organization-info/create"
                        >
                            "Добавить организацию"
                        </a>
                    </div>
                    <div class="modules-pages-profile-routes-organization-info-index__empty-container modules-pages-profile-routes-organization-info-index__empty-container_bold">
                        Это просто и бесплатно!
                    </div>
                </div>
            @endif
        @endcomponent
    @endcomponent
</div>
