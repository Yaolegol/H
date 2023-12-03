import {addEventListener} from "helpers/events";
import {module} from "helpers/module";
import 'views/components/inputs/send';
import './index.less';

class CallBackNew {
    constructor(element) {
        this.module = element;
        this.button = this.module.querySelector('.j-modules-common-callback-new__button');
        this.input = this.module.querySelector('.j-modules-common-callback-new__input');
        this.isSend = false;

        this.init();
        addEventListener(this.button, 'click', this.handleClick);
    }

    handleClick = (e) => {
        console.log('click!!!')
        console.log('this.input.value');
        console.log(this.input.value);

        const value = this.input.value;

        if(this.isSend || !value) {
            return;
        }

        this.isSend = true;
        this.module.classList.add('success');
        this.sendRequest(value);
    }

    init = () => {
        this.setCSRFToken();
    }

    sendRequest = async (value) => {
        const data = {
            text: value,
        }

        try {
            const response = await fetch('/callback', {
                body: JSON.stringify(data),
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': this.CSRFToken,
                },
                method: 'POST',
            });

            return response.json();
        } catch(e) {
            console.error(e);
        }
    }

    setCSRFToken = () => {
        const csrfContainer = document.querySelector('.j-csrf-token');

        this.CSRFToken = csrfContainer.dataset.value;
    }
}

module.initModule('j-modules-common-callback-new', CallBackNew);
