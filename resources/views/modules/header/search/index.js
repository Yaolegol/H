import {debounce} from "helpers/debounce";
import {addEventListener} from "helpers/events";
import './index.less';

class Search {
    constructor(element) {
        this.module = element;
        this.searchInput = this.module.querySelector('.j-header-search__input');
        this.sendButton = this.module.querySelector('.j-header-search__send-button');
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
        addEventListener(this.sendButton, 'blur', this.handleSendButtonBlur);
    }

    handleSearchInputInput = (e) => {
        debounce(this.sendRequest, 1000);
    }

    handleSendButtonBlur = (e) => {
        if(this.searchResultsArea) {
            this.searchResultsArea.classList.add('hidden');
        }
        if(this.searchResultsCategoriesContainer) {
            this.searchResultsCategoriesContainer.classList.add('hidden');
        }
        if(this.searchResultsSellersContainer) {
            this.searchResultsSellersContainer.classList.add('hidden');
        }
    }

    sendRequest = async () => {
        console.log('SEND');

        const searchValue = this.searchInput.value;

        console.log('searchValue')
        console.log(searchValue)

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
                }
            }
        }
    }
}

const list = [...document.querySelectorAll('.j-header-search')];

list.forEach((element) => {
    new Search(element);
});
