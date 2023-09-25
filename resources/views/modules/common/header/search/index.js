import {debounce} from "helpers/debounce";
import {addEventListener} from "helpers/events";
import {module} from "helpers/module";
import {toggleClass} from "helpers/toggle";
import "views/modules/common/header/search/templates/search-result-container";
import "views/modules/common/header/search/templates/search-result-item";
import "views/modules/common/header/search/templates/search-result-item/catalog";
import './index.less';

class Search {
    constructor(element) {
        this.module = element;
        this.searchResultsOutput = this.module.querySelector('.j-header-search__search-results-output');
        this.noResultsContainer = this.module.querySelector('.j-header-search__no-results-container');
        this.searchInput = this.module.querySelector('.j-header-search__input');
        this.clearButton = this.module.querySelector('.j-header-search__clear-button');
        this.mobileSearchButton = this.module.querySelector('.j-header-search__mobile-search-button');
        this.CSRFContainer = document.querySelector('.j-csrf-token');
        this.CSRFValue = this.CSRFContainer?.dataset.value;

        this.bind();
    }

    bind = () => {
        addEventListener(document, 'click', this.handleDocumentClick);
        addEventListener(this.searchInput, 'input', debounce(this.handleSearchInputInput, 500));
        addEventListener(this.searchInput, 'focus', this.handleSearchInputFocus);
        addEventListener(this.clearButton, 'click', this.handleClearButtonClick);
        addEventListener(this.mobileSearchButton, 'click', this.handleMobileSearchButtonClick);
    }

    clearResultsContainer = () => {
        this.searchResultsOutput.innerHTML = '';
        this.noResultsContainer.classList.add('hidden');
    }

    close = () => {
        this.module.classList.remove('j-style-header-search__focus');
        this.module.classList.remove('j-style-header-search__mobile-show');
    }

    createSearchResultBlock = ({dataList, title, type}) => {
        if(!dataList.length) {
            return;
        }

        const container = this.createSearchResultContainer(title);
        const items = this.createSearchResultItems(dataList, type);

        const itemsContainer = container.querySelector('.j-header-search__search-results-container');
        itemsContainer.innerHTML = items;

        return container;
    }

    createSearchResultContainer = (title) => {
        const containerTemplate = this.getSearchContainerTemplateHTML();

        const titleContainer = containerTemplate.querySelector('.j-header-search__search-results-container-title');
        titleContainer.innerHTML = title;

        return containerTemplate;
    }



    createSearchResultItems = (dataList, type) => {
        let items = [];

        switch (type) {
            case 'catalogLevelOne':
                items = dataList.map(({id, title}) => {
                    return this.getCardTemplateCatalog(1, id, title);
                });

                break;
            case 'catalogLevelTwo':
                items = dataList.map(({id, title}) => {
                    return this.getCardTemplateCatalog(2, id, title);
                });

                break;
            default:
                break;
        }

        console.log('dataList')
        console.log(dataList)
        console.log('type')
        console.log(type)
        console.log('items')
        console.log(items)

        // const itemsList = dataList.map(({linkFull, phone, title}) => {
        //     const template = this.getCardTemplateCatalog(title);
        //
        //
        //     const itemTemplate = this.getSearchItemTemplateHTML();
        //     const linkElement = itemTemplate.querySelector('.j-header-search__search-result-item-link');
        //
        //     const _title = title || 'Имя не указано';
        //     linkElement.innerHTML = `${_title}, ${phone}`;
        //     linkElement.href = linkFull;
        //
        //     return template;
        // });

        return items.join('');
    }

    fetchData = async () => {
        const searchValue = this.searchInput.value;

        if(!searchValue) {
            return;
        }

        const {data, errors} = await this.sendRequest(searchValue);

        if(errors) {
            return;
        }

        this.setData(data);
    }

    getCardTemplateCatalog = (level, id, title) => {
        return `
            <div class="modules-common-header-search-item">
                <button
                    class="j-modules-common-header-search-templates-search-result-item-catalog"
                    data-id="${id}"
                    data-level="${level}"
                    type="button"
                >${title}</button>
            </div>
        `;
    }

    getSearchContainerTemplateHTML = () => {
        const template = this.module.querySelector('.j-template[data-template-id="header-search-result-container"]');

        return template.content.firstElementChild.cloneNode(true);
    }

    getSearchItemTemplateHTML = () => {
        const template = this.module.querySelector('.j-template[data-template-id="header-search-result-item"]');

        return template.content.firstElementChild.cloneNode(true);
    }

    handleClearButtonClick = (e) => {
        this.searchInput.value = '';

        this.close();
        this.clearResultsContainer();
        toggleClass(this.module, 'j-style-header-search__has-value', false);
    }

    handleDocumentClick = (e) => {
        const isClickInside = this.module.contains(e.target);

        if(isClickInside) {
            return;
        }

        this.close();
    }

    handleMobileSearchButtonClick = (e) => {
        this.module.classList.add('j-style-header-search__mobile-show');
        this.searchInput.focus();
    }

    handleSearchInputFocus = (e) => {
        this.module.classList.add('j-style-header-search__focus');
    }

    handleSearchInputInput = (e) => {
        this.clearResultsContainer();

        const value = this.searchInput.value;

        if(value) {
            this.fetchData();
        }

        toggleClass(this.module, 'j-style-header-search__has-value', value);
    }

    isDataExists = (data) => {
        return data.some(({dataList}) => dataList.length);
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

    setData = (data) => {
        const isDataExists = this.isDataExists(data);

        if(!isDataExists) {
            this.noResultsContainer.classList.remove('hidden');

            return;
        }

        const list = data.map(this.createSearchResultBlock);
        const listFiltered = list.filter((item) => item);

        this.searchResultsOutput.prepend(...listFiltered);

        module.updateModules();
    }
}

module.initModule('j-header-search', Search);
