import {addEventListener} from "helpers/events";
import './index.less';

class RatingController {
    constructor(element) {
        this.module = element;
        this.isUpdate = this.module.hasAttribute('data-update');
        this.contentContainer = this.module.querySelector('.j-components-rating-common-controller__content');
        this.successContainer = this.module.querySelector('.j-components-rating-common-controller__success');
        this.errorContainer = this.module.querySelector('.j-components-rating-common-controller__error');

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

        const {comment, offer_id, value} = form.elements;

        const body = {
            comment: comment.value,
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

            if(!data.success) {
                this.showError();

                return;
            }

            this.showSuccess();
        } catch(err) {
            console.error(err);
        }
    }

    setCSRFToken = () => {
        const csrfContainer = document.querySelector('.j-csrf-token');

        this.CSRFToken = csrfContainer.dataset.value;
    }

    showError = () => {
        this.errorContainer.classList.remove('hidden');
        this.contentContainer.classList.add('hidden');
    }

    showSuccess = () => {
        this.successContainer.classList.remove('hidden');
        this.contentContainer.classList.add('hidden');
    }
}

const list = [...document.querySelectorAll('.j-components-rating-common-controller')];

list.forEach((element) => {
    new RatingController(element);
});
