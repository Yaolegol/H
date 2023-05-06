import {addEventListener} from "helpers/events";
import './index.less';

class RatingController {
    constructor(element) {
        this.module = element;
        this.isUpdate = this.module.hasAttribute('data-update');

        this.init();
        this.bind();
    }

    bind = () => {
        addEventListener(this.module, 'submit', this.handleSubmit);
    }

    handleSubmit = (e) => {
        e.preventDefault();

        this.sendRequest(e);
    }

    init = () => {
        this.setCSRFToken();
    }

    sendRequest = async (e) => {
        const form = e.currentTarget;

        const {offer_id, value} = form.elements;

        const body = {
            offer_id: offer_id.value,
            value: value.value,
        }

        try {
            const response = await fetch(form.action, {
                body: JSON.stringify(body),
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': this.CSRFToken,
                },
                method: this.isUpdate ? 'PUT' : 'POST',
            });

            const {data, errors} = await response.json();

            console.log('data');
            console.log(data);
        } catch(err) {
            console.error(err);
        }
    }

    setCSRFToken = () => {
        const csrfContainer = document.querySelector('.j-csrf-token');

        this.CSRFToken = csrfContainer.dataset.value;
    }
}

const list = [...document.querySelectorAll('.j-components-rating-common-controller')];

list.forEach((element) => {
    new RatingController(element);
});
