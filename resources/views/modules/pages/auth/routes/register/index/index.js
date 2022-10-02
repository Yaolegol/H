import {addEventListener} from "helpers/events";
import {module} from "helpers/module";
import 'views/components/form/error';
import 'views/components/inputs/form';
import 'views/components/inputs/phone';
import 'views/modules/pages/auth/common/components/formItemContainer';
import 'views/modules/pages/auth/common/components/layout';

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

        const data = {
            phone: phoneValue,
            password: passwordValue,
            password_confirmation: password_confirmationValue,
        }

        const response = await this.sendData(data);

        console.log('response');
        console.log(response);
    }

    sendData = async (data) => {
        const response = await fetch('/api/register', {
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
