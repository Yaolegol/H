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
                placeholder="Найти"
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
                <div class="j-header-search__search-results-output"></div>
                <div class="hidden j-header-search__no-results-container">Результатов не найдено</div>
            </div>
        </div>
    </div>
    @include('modules.common.header.search.templates.search-result-container.index')
    @include('modules.common.header.search.templates.search-result-item.index')
</div>
