import {addEventListener} from "helpers/events";
import {module} from "helpers/module";
import 'views/modules/pages/auth/common/components/layout/form';
import 'views/modules/pages/auth/common/components/layout/page';
import 'views/modules/pages/auth/routes/register/components/confirmCode';
import 'views/modules/pages/auth/routes/register/components/sendSms';
import './index.less';

class Register {
    constructor(element) {
        this.module = element;
        this.sendSmsContainer = this.module.querySelector('.j-modules-pages-auth-routes-register-index__send-sms-container');
        this.confirmCodeContainer = this.module.querySelector('.j-modules-pages-auth-routes-register-index__confirm-code-container');
        this.errorContainer = this.module.querySelector('.j-modules-pages-auth-routes-register-index__error-container');
        this.inputsCodeModule = this.module.querySelector('.j-components-inputs-code');
        this.CSRFContainer = document.querySelector('.j-csrf-token');
        this.CSRFValue = this.CSRFContainer?.dataset.value;

        this.bind();
    }

    bind = () => {
        addEventListener(this.module, 'submit', this.handleSubmit);
        addEventListener(this.inputsCodeModule, 'j-event-components-inputs-code__complete', this.handleCompleteCode);
    }

    handleCompleteCode = (e) => {
        const {code} = e.detail;

        this.errorContainer.innerHTML = '';
        this.errorContainer.classList.add('hidden');

        this.handleConfirmCode(Number(code));
    }

    handleConfirmCode = async (code) => {
        const _data = {
            code,
            phone: this.phoneValue,
            password: this.passwordValue,
            password_confirmation: this.password_confirmationValue,
        }

        const {errors} = await this.sendConfirmCode(_data);

        if(errors !== '') {
            this.errorContainer.innerHTML = errors[0];
            this.errorContainer.classList.remove('hidden');

            return;
        }

        window.location.href = '/'
    }

    handleSendSms = async (e) => {
        const {phone, password, password_confirmation} = e.target.elements;

        this.phoneValue = phone.value;
        this.passwordValue = password.value;
        this.password_confirmationValue = password_confirmation.value;

        const _data = {
            phone: this.phoneValue,
            password: this.passwordValue,
            password_confirmation: this.password_confirmationValue,
        }

        const {errors} = await this.sendSms(_data);

        if(errors !== '') {
            this.errorContainer.innerHTML = errors[0];
            this.errorContainer.classList.remove('hidden');

            return;
        }

        this.switchToConfirmCode();
    }

    handleSubmit = (e) => {
        e.preventDefault();

        this.errorContainer.innerHTML = '';
        this.errorContainer.classList.add('hidden');

        this.handleSendSms(e);
    }

    sendConfirmCode = async (data) => {
        const response = await fetch('/register/confirmCode', {
            body: JSON.stringify(data),
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': this.CSRFValue,
            },
            method: 'POST',
        });

        return response.json();
    }

    sendSms = async (data) => {
        const response = await fetch('/register/sendSms', {
            body: JSON.stringify(data),
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': this.CSRFValue,
            },
            method: 'POST',
        });

        return response.json();
    }

    switchToConfirmCode = () => {
        this.sendSmsContainer.classList.add('hidden');
        this.confirmCodeContainer.classList.remove('hidden');
    }
}


module.initModule('j-modules-pages-auth-routes-register-index', Register);
