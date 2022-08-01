<template
    class="j-template"
    data-template-id="map-catalog-filter"
>
    @include('components.modals.layout.catalog.index', [
        'catalog' => $catalogHeader,
        'contentItem' => 'modules.common.map.common.components.filters.product.modal.components.buttons.content.index',
        'navigationItem' => 'modules.common.map.common.components.filters.product.modal.components.buttons.navigation.index',
        'title' => 'Выберите категорию',
    ])
</template>
