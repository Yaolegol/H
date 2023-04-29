import {addEventListener} from 'helpers/events';
import {module} from "helpers/module";
import './index.less';

export class Info {
    constructor(element) {
        this.module = element;
        this.closeButton = this.module.querySelector('.j-components-info-common__close-button');
        this.id = this.module.dataset.id;

        this.init();
        this.bind();
    }

    bind = () => {
        addEventListener(this.closeButton, 'click', this.handleClick);
    }

    handleClick = () => {
        this.module.classList.add('hidden');

        localStorage.setItem(this.id, 'hidden');
    }

    init = () => {
        const isHide = localStorage.getItem(this.id);

        if(isHide) {
            return;
        }

        this.show();
    }

    show = () => {
        this.module.classList.remove('hidden');
    }
}

module.initModule('j-components-info-common', Info);
