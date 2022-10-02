import {addEventListener} from "helpers/events";
import {module} from "helpers/module";
import 'views/modules/pages/auth/routes/register/components/confirmCode';
import 'views/modules/pages/auth/routes/register/components/sendSms';

class Test {
    constructor(element) {
        this.module = element;
        this.CSRFContainer = document.querySelector('.j-csrf-token');
        this.CSRFValue = this.CSRFContainer?.dataset.value;

        this.bind();
    }

    bind = () => {
        addEventListener(this.module, 'submit', this.handleSubmit)
    }

    handleSubmit = async (e) => {
        e.preventDefault();

        const {phone, password, password_confirmation} = e.target.elements;

        const phoneValue = phone.value;
        const passwordValue = password.value;
        const password_confirmationValue = password_confirmation.value;

        const _data = {
            phone: phoneValue,
            password: passwordValue,
            password_confirmation: password_confirmationValue,
        }

        const {data, errors} = await this.sendSms(_data);

        if(errors !== '') {
            return;
        }


    }

    sendSms = async (data) => {
        const response = await fetch('/api/register/sendSms', {
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
}


module.initModule('j-test', Test);
