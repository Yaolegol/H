@component('modules.profile.common.body.index.index', [
        'createLink' => '/profile/organization-info/create',
        'createTitle' => 'Добавить организацию',
        'title' => 'Ваши организации'
    ])
    @foreach ($organizationList as $organizationItem)
        @component('modules.profile.common.container.card.index')
            @include('components.cards.organization.index', [
                            'organization' => $organizationItem,
                        ])
        @endcomponent
    @endforeach
@endcomponent


