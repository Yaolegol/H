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

        this.bind();
    }

    bind = () => {
        addEventListener(this.sendButton, 'click', this.handleSendButtonClick);
    }

    handleSendButtonClick = () => {
        this.sendRequest();
    }

    sendRequest = async () => {
        const searchValue = this.searchInput.value;

        console.log('searchValue')
        console.log(searchValue)

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

        const data = await response.json();

        console.log('data')
        console.log(data)
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

        if(this.searchResultsCategoriesContainer) {
            const layoutArray = catalogDataList.map((catalogData) => {
                const {href, textContent} = catalogData;

                return `<div>
                            <a href="${href}">${textContent}</a>
                        </div>`;
            });

            this.searchResultsCategoriesContainer.innerHTML = layoutArray.join('');
        }
    }
}

const list = [...document.querySelectorAll('.j-header-search')];

list.forEach((element) => {
    new Search(element);
});
