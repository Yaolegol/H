import {addEventListener} from "helpers/events";
import './index.less';

class SearchInput {
    constructor(element) {
        this.module = element;
        this.name = this.module.dataset.name;
        this.searchInput = this.module.querySelector('.j-inputs-search__input');

        this.bind();
    }

    bind = () => {
        addEventListener(this.searchInput, 'input', this.handleInput);
    }

    handleInput = (e) => {
        document.dispatchEvent(new CustomEvent('j-event-inputs-search__input', {
            detail: {
                name: this.name,
                value: e.target.value,
            }
        }));
    }
}

const list = [...document.querySelectorAll('.j-inputs-search')];

list.forEach((element) => {
    new SearchInput(element);
});
