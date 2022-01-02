import {addEventListener} from "helpers/events";
import './index.less';

class Search {
    constructor(element) {
        this.module = element;
        this.searchInput = this.module.querySelector('.j-header-search__input');
        this.sendButton = this.module.querySelector('.j-header-search__send-button');
        this.CSRFContainer = document.querySelector('.j-csrf-token');
        this.CSRFValue = this.CSRFContainer?.dataset.value;

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
    }
}

const list = [...document.querySelectorAll('.j-header-search')];

list.forEach((element) => {
    new Search(element);
});
