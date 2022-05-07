<div class="modules-common-header-search j-header-search">
    <button
        class="modules-common-header-search__mobile-search-button j-header-search__mobile-search-button"
        type="button"
    >
        @include('icons.search')
    </button>
    <div class="modules-common-header-search__search-block j-header-search__search-block">
        <label class="modules-common-header-search__search-container j-header-search__search-container">
            <input
                class="modules-common-header-search__input j-header-search__input"
                placeholder="Найти категорию или продавца"
                type="text"
            />
            <button
                class="modules-common-header-search__clear-button j-header-search__clear-button"
                type="button"
            >
                @include('icons.close')
            </button>
        </label>
        <div class="modules-common-header-search__search-results-area">
            <div class="modules-common-header-search__search-results-block">
                <div class="modules-common-header-search__search-results-container modules-common-header-search__search-results-container_categories-results">
                    <div>Категории</div>
                    <div class="modules-common-header-search__result-container j-header-search__search-results-categories-result-container"></div>
                </div>
                <div class="modules-common-header-search__search-results-container modules-common-header-search__search-results-container_sellers-results">
                    <div>Продавцы</div>
                    <div class="modules-common-header-search__result-container j-header-search__search-results-sellers-result-container"></div>
                </div>
                <div class="modules-common-header-search__search-results-container modules-common-header-search__search-results-container_no-results">
                    <div>Найдено 0 результатов</div>
                </div>
            </div>
        </div>
    </div>
</div>
