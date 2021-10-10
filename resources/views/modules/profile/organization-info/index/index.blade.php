<div class="profile--organization-info--index">
    <div>
        <a
            class="profile--organization-info--index__create-link"
            href="/profile/organization-info/create"
        >
            Добавить организацию
        </a>
    </div>
    <div class="profile--organization-info--index__content-container">
        <h2>Ваши организации</h2>
        @foreach ($organizationList as $organizationItem)
            <div class="profile--organization-info--index__sale-point-container">
                @include('components.cards.organization.index', [
                            'organization' => $organizationItem,
                        ])
            </div>
        @endforeach
    </div>
</div>


