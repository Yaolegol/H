<button
    class="map-common-components-filters-modal-components-buttons-content j-map-common-components-filters-modal-components-buttons-content"
    data-id="{{$contentData['id']}}"
    type="button"
>{{$contentData['title']}}</button>

{{--<div--}}
{{--    class="modules-pages-map-web-common-components-filters-modal-modal-content j-map-web-filters-components-modal-modal-content"--}}
{{-->--}}
{{--    <h2 class="modules-pages-map-web-common-components-filters-modal-modal-content__title">Фильтр</h2>--}}
{{--    <div class="modules-pages-map-web-common-components-filters-modal-modal-content__description">--}}
{{--        (выберите интересующий продукт для фильтрации по нему)--}}
{{--    </div>--}}
{{--    <div class="modules-pages-map-web-common-components-filters-modal-modal-content__filter-item-container">--}}
{{--        <div class="modules-pages-map-web-common-components-filters-modal-modal-content__content-container">--}}
{{--                        @component('components.catalog.container.index')--}}
{{--                            @component('components.catalog.navigation-item-container.index')--}}
{{--                                @foreach($catalogHeader as $catalogItem)--}}
{{--                                    @component('components.catalog.navigation-item.index', [--}}
{{--                                        'itemId' => $loop->index,--}}
{{--                                        'itemValue' => $catalogItem['title'],--}}
{{--                                    ])--}}
{{--                                        @component('modules.pages.common.components.filters.modal.modalContent.navigationItem.index')--}}
{{--                                            {{ $catalogItem['title'] }}--}}
{{--                                        @endcomponent--}}
{{--                                    @endcomponent--}}
{{--                                @endforeach--}}
{{--                            @endcomponent--}}
{{--                            @component('components.catalog.content-item-container.index', [--}}
{{--                                'withoutPadding' => true,--}}
{{--                            ])--}}
{{--                                @foreach($catalogHeader as $catalogItem)--}}
{{--                                    @component('components.catalog.content-item.index', [--}}
{{--                                        'itemId' => $loop->index,--}}
{{--                                    ])--}}
{{--                                        <div class="modules-pages-map-web-common-components-filters-modal-modal-content__categories-container">--}}
{{--                                            @foreach( $catalogItem['catalog_level_two'] as $category )--}}
{{--                                                @component('components.catalog.category-item.index', [--}}
{{--                                                    'className' => 'j-components-catalog-content-item__category',--}}
{{--                                                    'value' => $category['title'],--}}
{{--                                                ])--}}
{{--                                                    @component('modules.pages.common.components.filters.modal.modalContent.navigationContentButton.index', [--}}
{{--                                                        'id' => $category['id']--}}
{{--                                                    ])--}}
{{--                                                        {{ $category['title'] }}--}}
{{--                                                    @endcomponent--}}
{{--                                                @endcomponent--}}
{{--                                            @endforeach--}}
{{--                                        </div>--}}
{{--                                    @endcomponent--}}
{{--                                @endforeach--}}
{{--                            @endcomponent--}}
{{--                        @endcomponent--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

