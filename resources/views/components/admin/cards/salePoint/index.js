import {addEventListener} from "helpers/events";
import {module} from "helpers/module";
import './index.less';

class AdminCard {
    constructor(element) {
        this.module = element;
        this.id = this.module.dataset.id;
        this.buttonApprove = this.module.querySelector('.j-components-admin-cards-sale-point__button-approve');
        this.buttonReject = this.module.querySelector('.j-components-admin-cards-sale-point__button-reject');
        this.textarea = this.module.querySelector('.j-components-admin-cards-sale-point__textarea');

        this.init();
        this.bind();
    }

    bind = () => {
        addEventListener(this.buttonApprove, 'click', this.handleApprove);
        addEventListener(this.buttonReject, 'click', this.handleReject);
    }

    handleApprove = async () => {
        const {errors, success} = await this.sendApproveRequest();

        if(!success) {
            return;
        }

        window.location.reload();
    }

    handleReject = async () => {
        if(!this.textarea.value) {
            window.alert('Не указана причина отклонения!');
        }

        const data = {
            error: {
                message: this.textarea.value,
            }
        }

        const {errors, success} = await this.sendRejectRequest(data);

        if(!success) {
            return;
        }

        window.location.reload();
    }

    init = () => {
        this.setCSRFToken();
    }

    sendApproveRequest = async () => {
        try {
            const response = await fetch(`/admin/sale-point/approve/${this.id}`, {
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

        return {};
    }

    sendRejectRequest = async (data) => {
        try {
            const body = JSON.stringify(data);

            const response = await fetch(`/admin/sale-point/reject/${this.id}`, {
                body,
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

        return {};
    }

    setCSRFToken = () => {
        const csrfContainer = document.querySelector('.j-csrf-token');

        this.CSRFToken = csrfContainer.dataset.value;
    }
}

module.initModule('j-components-admin-cards-sale-point', AdminCard);
