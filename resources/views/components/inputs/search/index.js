import {addEventListener} from "helpers/events";
import {module} from "helpers/module";
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

module.initModule('j-inputs-search', SearchInput);
