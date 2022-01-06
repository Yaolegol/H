import {debounce} from "helpers/debounce";
import {addEventListener} from "helpers/events";
import './index.less';

class Search {
    constructor(element) {
        this.module = element;
        this.searchInput = this.module.querySelector('.j-header-search__input');
        this.clearButton = this.module.querySelector('.j-header-search__clear-button');
        this.searchResultsNonContainer = this.module.querySelector('.j-header-search__search-results-non-container');
        this.CSRFContainer = document.querySelector('.j-csrf-token');
        this.CSRFValue = this.CSRFContainer?.dataset.value;
        this.searchElementsList = [...document.querySelectorAll('.j-header-catalog__search-element')];
        this.searchResultsCategoriesContainer = this.module.querySelector('.j-header-search__search-results-categories-container');
        this.searchResultsSellersContainer = this.module.querySelector('.j-header-search__search-results-sellers-container');
        this.searchResultsCategoriesResultContainer = this.module.querySelector('.j-header-search__search-results-categories-result-container');
        this.searchResultsSellersResultContainer = this.module.querySelector('.j-header-search__search-results-sellers-result-container');
        this.searchResultsArea= this.module.querySelector('.j-header-search__search-results-area');

        this.bind();
    }

    bind = () => {
        addEventListener(this.searchInput, 'input', this.handleSearchInputInput);
        addEventListener(this.clearButton, 'click', this.handleClearButtonClick);
    }

    checkSearchCategory = (searchValue) => {
        const catalogSearchDataList = this.getCatalogSearchDataList(searchValue);
        const catalogSearchLayout = this.getCatalogSearchLayout(catalogSearchDataList);

        return this.toggleShowSearchCategory(catalogSearchLayout);
    }

    checkSearchSellers = (data) => {
        const sellersLayout = this.getSearchSellersLayout(data);

        return this.toggleShowSearchSellers(sellersLayout);
    }

    getCatalogSearchDataList = (searchValue) => {
        const regexp = new RegExp(searchValue, 'gi');

        return this.searchElementsList.reduce((acc, element, arr) => {
            const {href, textContent} = element;
            const isMatch = regexp.test(textContent);

            if(isMatch) {
                return [
                    ...acc,
                    {
                        href,
                        textContent,
                    }
                ];
            } else {
                return acc;
            }
        }, []);
    }

    getCatalogSearchLayout = (catalogSearchDataList) => {
        const layoutArray = catalogSearchDataList.map((catalogData) => {
            const {href, textContent} = catalogData;

            return `<div>
                       <a href="${href}">${textContent}</a>
                    </div>`;
        });

        return layoutArray.join('');
    }

    getSearchSellersLayout = (data) => {
        const layoutArray = data.map((responseUserData) => {
            const {organizationsList, userData} = responseUserData;
            const {link, title} = userData;

            const userLink = `<div>
                                 <a href="${link}">${title}</a>
                              </div>`;

            const linksArray = [userLink];

            organizationsList.forEach((organizationData) => {
                const organizationLink = `<div>
                                             <a href="${link}">${organizationData.title}</a>
                                          </div>`;

                linksArray.push(organizationLink);
            });

            return linksArray.join('');
        });

        return layoutArray.join('');
    }

    handleClearButtonClick = (e) => {
        this.searchInput.value = '';
        this.searchInput.focus();
        this.searchResultsArea.classList.add('hidden');
        this.searchResultsCategoriesContainer.classList.add('hidden');
        this.searchResultsSellersContainer.classList.add('hidden');
        this.hideNonResultsMessage();
        this.searchResultsCategoriesResultContainer.innerHTML = '';
        this.searchResultsSellersResultContainer.innerHTML = '';
        this.clearButton.classList.add('modules-common-header-search__clear-button_hidden');
    }

    handleSearchInputInput = (e) => {
        const value = this.searchInput.value;

        if(value) {
            this.showClearButton();
            this.hideNonResultsMessage();
            debounce(this.inputDebounce, 1000);
        } else {
            this.handleClearButtonClick();
        }
    }

    hideNonResultsMessage = () => {
        this.searchResultsNonContainer.classList.add('hidden');
    }

    inputDebounce = async () => {
        const searchValue = this.searchInput.value;

        if(!searchValue) {
            return;
        }

        const {data, errors} = await this.sendRequest(searchValue);

        if(!errors) {
            const isCategoryShow = this.checkSearchCategory(searchValue);
            const isSellersShow = this.checkSearchSellers(data);

            if(!isCategoryShow && !isSellersShow) {
                this.showNonResultsMessage();
            }
        }
    }

    sendRequest = async (searchValue) => {
        const bodyData = {
            data: {
                title: searchValue,
            }
        }

        const body = JSON.stringify(bodyData);

        const response = await fetch('/api/search/common', {
            body,
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': this.CSRFValue,
            },
            method: 'POST',
        });

        return response.json();
    }

    showClearButton = () => {
        this.clearButton.classList.remove('modules-common-header-search__clear-button_hidden');
    }

    showNonResultsMessage = () => {
        this.searchResultsArea.classList.remove('hidden');
        this.searchResultsNonContainer.classList.remove('hidden');
    }

    toggleShowSearchCategory = (catalogSearchLayout) => {
        if(catalogSearchLayout) {
            this.searchResultsCategoriesResultContainer.innerHTML = catalogSearchLayout;
            this.searchResultsCategoriesContainer.classList.remove('hidden');
            this.searchResultsArea.classList.remove('hidden');

            return true;
        }

        this.searchResultsCategoriesContainer.classList.add('hidden');

        return false;
    }

    toggleShowSearchSellers = (sellersLayout) => {
        if(sellersLayout) {
            this.searchResultsSellersResultContainer.innerHTML = sellersLayout;
            this.searchResultsSellersContainer.classList.remove('hidden');
            this.searchResultsArea.classList.remove('hidden');

            return true;
        }

        this.searchResultsSellersContainer.classList.add('hidden');

        return false;
    }
}

const list = [...document.querySelectorAll('.j-header-search')];

list.forEach((element) => {
    new Search(element);
});
