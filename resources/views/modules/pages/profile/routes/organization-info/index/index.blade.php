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
                    <div>Добавьте организацию - <span style="font-weight: bold">это просто и бесплатно!</span></div>
                </div>
            @endif
        @endcomponent
    @endcomponent
</div>
