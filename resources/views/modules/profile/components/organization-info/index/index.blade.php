@component('modules.profile.common.body.index.index', [
        'createLink' => '/profile/organization-info/create',
        'createTitle' => 'Добавить организацию',
        'title' => 'Ваши организации'
    ])
    @component('modules.profile.common.container.card.index')
        @foreach ($organizationList as $organizationItem)
            @include('components.cards.organization.index', [
                            'organization' => $organizationItem,
                        ])
        @endforeach
    @endcomponent
@endcomponent


