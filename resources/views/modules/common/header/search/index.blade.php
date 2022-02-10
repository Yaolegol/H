<div class="modules-common-header-search j-header-search">
    <button
        class="modules-common-header-search__mobile-search-button j-header-search__mobile-search-button"
        type="button"
    >
        @include('icons.search')
    </button>
    <div class="modules-common-header-search__search-block j-header-search__search-block">
        <div class="modules-common-header-search__search-container j-header-search__search-container">
            <input
                class="modules-common-header-search__input j-header-search__input"
                placeholder="Search"
                type="text"
            >
            <button
                class="modules-common-header-search__clear-button modules-common-header-search__clear-button_hidden j-header-search__clear-button"
                type="button"
            >
                @include('icons.close')
            </button>
        </div>
        <div class="modules-common-header-search__search-results-area hidden j-header-search__search-results-area">
            <div class="modules-common-header-search__search-results-block j-header-search__search-results-block">
                <div class="modules-common-header-search__search-results-container hidden j-header-search__search-results-categories-container">
                    <div>Категории</div>
                    <div class="modules-common-header-search__result-container j-header-search__search-results-categories-result-container"></div>
                </div>
                <div class="modules-common-header-search__search-results-container hidden j-header-search__search-results-sellers-container">
                    <div>Продавцы</div>
                    <div class="modules-common-header-search__result-container j-header-search__search-results-sellers-result-container"></div>
                </div>
                <div class="modules-common-header-search__search-results-container hidden j-header-search__search-results-non-container">
                    <div>Найдено 0 результатов</div>
                </div>
            </div>
        </div>
    </div>
</div>
