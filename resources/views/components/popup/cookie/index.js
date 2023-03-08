import {addEventListener} from "helpers/events";
import {module} from "helpers/module";
import './index.less';

class Cookie {
    constructor(element) {
        this.module = element;
        this.button = this.module.querySelector('.j-components-popup-cookie__button-accept');

        this.init();
        this.bind();
    }

    bind = () => {
        addEventListener(this.button, 'click', this.handleAcceptCookie);
    }

    handleAcceptCookie = () => {
        localStorage.setItem('cookie_accept', true);
        this.module.classList.add('hidden');
    }

    init = () => {
        const isAccepted = Boolean(localStorage.getItem('cookie_accept'));

        if(!isAccepted) {
            this.module.classList.remove('hidden');
        }
    }
}


module.initModule('j-components-popup-cookie', Cookie);
