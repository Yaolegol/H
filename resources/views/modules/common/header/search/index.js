import {debounce} from "helpers/debounce";
import {addEventListener} from "helpers/events";
import {toggleClass} from "helpers/toggle";
import './index.less';

class Search {
    constructor(element) {
        this.module = element;
        this.searchInput = this.module.querySelector('.j-header-search__input');
        this.clearButton = this.module.querySelector('.j-header-search__clear-button');
        this.mobileSearchButton = this.module.querySelector('.j-header-search__mobile-search-button');
        this.CSRFContainer = document.querySelector('.j-csrf-token');
        this.CSRFValue = this.CSRFContainer?.dataset.value;
        this.searchElementsList = [...document.querySelectorAll('.j-header-catalog__search-element')];
        this.searchResultsCategoriesResultContainer = this.module.querySelector('.j-header-search__search-results-categories-result-container');
        this.searchResultsSellersResultContainer = this.module.querySelector('.j-header-search__search-results-sellers-result-container');

        this.bind();
    }

    bind = () => {
        addEventListener(this.searchInput, 'input', this.handleSearchInputInput);
        addEventListener(this.searchInput, 'focus', this.handleSearchInputFocus);
        addEventListener(this.searchInput, 'blur', this.handleSearchInputBlur);
        addEventListener(this.clearButton, 'mousedown', this.handleClearButtonMouseDown);
        addEventListener(this.clearButton, 'click', this.handleClearButtonClick);
        addEventListener(this.mobileSearchButton, 'click', this.handleMobileSearchButtonClick);
    }

    clearModuleClasses = () => {
        this.module.classList.remove('j-style-header-search__has-value');
        this.module.classList.remove('j-style-header-search__has-results');
        this.module.classList.remove('j-style-header-search__no-results');
        this.module.classList.remove('j-style-header-search__has-categories-results');
        this.module.classList.remove('j-style-header-search__has-sellers-results');
    }

    clearSearchResults = () => {
        this.searchResultsCategoriesResultContainer.innerHTML = '';
        this.searchResultsSellersResultContainer.innerHTML = '';
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
        this.clearSearchResults();
        this.clearModuleClasses();
    }

    handleClearButtonMouseDown = (e) => {
        e.preventDefault();
    }

    handleMobileSearchButtonClick = (e) => {
        this.module.classList.add('j-style-header-search__mobile-show');
        this.searchInput.focus();
    }

    handleSearchInputBlur = (e) => {
        setTimeout(() => {
            this.module.classList.remove('j-style-header-search__focus');
            this.module.classList.remove('j-style-header-search__mobile-show');
        });
    }

    handleSearchInputFocus = (e) => {
        this.module.classList.add('j-style-header-search__focus');
    }

    handleSearchInputInput = (e) => {
        const value = this.searchInput.value;

        if(value) {
            debounce(this.inputDebounce, 1000);
        }

        toggleClass(this.module, 'j-style-header-search__has-value', value);
    }

    inputDebounce = async () => {
        const searchValue = this.searchInput.value;

        if(!searchValue) {
            return;
        }

        const {data, errors} = await this.sendRequest(searchValue);

        if(!errors) {
            const isCategorySet = this.setSearchCategory(searchValue);
            const isSellersSet = this.setSearchSellers(data);

            toggleClass(this.module, 'j-style-header-search__no-results', !isCategorySet && !isSellersSet);
            toggleClass(this.module, 'j-style-header-search__has-results', isCategorySet || isSellersSet);
            toggleClass(this.module, 'j-style-header-search__has-categories-results', isCategorySet);
            toggleClass(this.module, 'j-style-header-search__has-sellers-results', isSellersSet);
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

    setSearchCategory = (searchValue) => {
        const catalogSearchDataList = this.getCatalogSearchDataList(searchValue);
        const catalogSearchLayout = this.getCatalogSearchLayout(catalogSearchDataList);

        if(catalogSearchLayout) {
            this.searchResultsCategoriesResultContainer.innerHTML = catalogSearchLayout;

            return true;
        }

        return false;
    }

    setSearchSellers = (data) => {
        const sellersLayout = this.getSearchSellersLayout(data);

        if(sellersLayout) {
            this.searchResultsSellersResultContainer.innerHTML = sellersLayout;

            return true;
        }

        return false;
    }
}

const list = [...document.querySelectorAll('.j-header-search')];

list.forEach((element) => {
    new Search(element);
});
