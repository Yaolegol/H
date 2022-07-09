<template
    class="j-template"
    data-template-id="catalog"
>
    @include('components.modals.layout.catalog.index', [
        'catalog' => $catalogHeader,
        'contentItem' => 'modules.common.catalog.modal.components.buttons.content.index',
        'navigationItem' => 'modules.common.catalog.modal.components.buttons.navigation.index',
        'title' => 'Выберите категорию',
    ])
</template>
