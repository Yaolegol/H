<template
    class="j-template"
    data-template-id="location"
>
    @include('components.modals.layout.catalog.index', [
        'catalog' => $locationList,
        'className' => 'j-location-modal-content',
        'contentItem' => 'modules.common.location.components.modal.components.buttons.content.index',
        'navigationItem' => 'modules.common.location.components.modal.components.buttons.navigation.index',
        'title' => 'Выберите город или регион',
    ])
</template>
