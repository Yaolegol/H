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

    handleClearButtonClick = (e) => {
        this.searchInput.value = '';
        this.searchInput.focus();
        this.searchResultsArea.classList.add('hidden');
        this.searchResultsCategoriesContainer.classList.add('hidden');
        this.searchResultsSellersContainer.classList.add('hidden');
        this.searchResultsNonContainer.classList.add('hidden');
        this.searchResultsCategoriesResultContainer.innerHTML = '';
        this.searchResultsSellersResultContainer.innerHTML = '';

        this.clearButton.classList.add('inputs-search__clear-button_hidden');
    }

    handleSearchInputInput = (e) => {
        const value = this.searchInput.value;

        if(value) {
            debounce(this.sendRequest, 1000);
            this.clearButton.classList.remove('inputs-search__clear-button_hidden');
        } else {
            this.handleClearButtonClick();
        }
    }

    sendRequest = async () => {
        console.log('SEND');

        const searchValue = this.searchInput.value;

        if(!searchValue) {
            return;
        }

        console.log('searchValue')
        console.log(searchValue)

        this.searchResultsNonContainer.classList.add('hidden');
        let isCategoryShow = false;
        let isSellersShow = false;

        const bodyData = {
            data: {
                title: searchValue,
            }
        }

        const body = JSON.stringify(bodyData);

        const catalogDataList = [];
        const regexp = new RegExp(searchValue, 'gi');

        this.searchElementsList.forEach((element) => {
            const {href, textContent} = element;
            const isMatch = regexp.test(textContent);

            if(isMatch) {
                catalogDataList.push({
                    href,
                    textContent,
                });
            }
        });

        if(this.searchResultsCategoriesResultContainer) {
            const layoutArray = catalogDataList.map((catalogData) => {
                const {href, textContent} = catalogData;

                return `<div>
                            <a href="${href}">${textContent}</a>
                        </div>`;
            });

            const categoriesLayout = layoutArray.join('');

            if(categoriesLayout) {
                this.searchResultsCategoriesResultContainer.innerHTML = categoriesLayout;
                this.searchResultsCategoriesContainer.classList.remove('hidden');
                this.searchResultsArea.classList.remove('hidden');
                isCategoryShow = true;
            } else {
                this.searchResultsCategoriesContainer.classList.add('hidden');
            }
        }

        const response = await fetch('/api/search/common', {
            body,
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': this.CSRFValue,
            },
            method: 'POST',
        });

        const {data, errors} = await response.json();

        console.log('data')
        console.log(data)

        if(!errors) {
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

            if(this.searchResultsSellersResultContainer) {
                const sellersLayout = layoutArray.join('');

                if(sellersLayout) {
                    this.searchResultsSellersResultContainer.innerHTML = sellersLayout;
                    this.searchResultsSellersContainer.classList.remove('hidden');
                    this.searchResultsArea.classList.remove('hidden');
                    isSellersShow = true;
                } else {
                    this.searchResultsSellersContainer.classList.add('hidden');
                }
            }

            this.clearButton.classList.remove('inputs-search__clear-button_hidden');
        }

        if(!isCategoryShow && !isSellersShow) {
            this.searchResultsArea.classList.remove('hidden');
            this.searchResultsNonContainer.classList.remove('hidden');
        }
    }
}

const list = [...document.querySelectorAll('.j-header-search')];

list.forEach((element) => {
    new Search(element);
});
