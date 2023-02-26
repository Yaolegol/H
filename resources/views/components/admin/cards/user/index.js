import {addEventListener} from "helpers/events";
import {module} from "helpers/module";
import './index.less';

class AdminCardUser {
    constructor(element) {
        this.module = element;
        this.id = this.module.dataset.id;
        this.buttonApprove = this.module.querySelector('.j-components-admin-cards-user__button-approve');
        this.buttonReject = this.module.querySelector('.j-components-admin-cards-user__button-reject');

        this.init();
        this.bind();
    }

    bind = () => {
        addEventListener(this.buttonApprove, 'click', this.handleApprove);
        addEventListener(this.buttonReject, 'click', this.handleReject);
    }

    handleApprove = async () => {
        const {errors, success} = await this.sendApproveRequest(1);

        if(!success) {
            return;
        }

        window.location.reload();
    }

    handleReject = async () => {
        const {errors, success} = await this.sendApproveRequest(-1);

        if(!success) {
            return;
        }

        window.location.reload();
    }

    init = () => {
        this.setCSRFToken();
    }

    sendApproveRequest = async (isApproved) => {
        const data = {
            approve: isApproved,
        }

        try {
            const body = JSON.stringify(data);

            const response = await fetch(`/admin/user/approve/${this.id}`, {
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

module.initModule('j-components-admin-cards-user', AdminCardUser);
