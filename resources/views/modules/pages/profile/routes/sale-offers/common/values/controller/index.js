import {EVENTS_NAMES} from 'events/index';
import {addEventListener} from "helpers/events";
import {module} from "helpers/module";

const {
    INPUTS: {
        RADIO: {
            GROUP: {
                CHANGE,
                INIT,
            }
        }
    }
} = EVENTS_NAMES;

class ValuesController {
    constructor(element) {
        console.log('ValuesController constructor');

        this.module = element;

        this.bind();
    }

    bind = () => {
        addEventListener(document, CHANGE, this.handleChange);
    }

    handleChange = (e) => {
        const {groupName, isChecked, title, value} = e.detail;
        console.log('ValuesController handleChange');
        console.log('title');
        console.log(title);
        console.log('isChecked');
        console.log(isChecked);
        console.log('groupName');
        console.log(groupName);
        console.log('value');
        console.log(value);

        const detailData = {
            data: {
                isChecked,
                title,
                value,
            },
            id: 'id-categories',
        }

        this.sendMessageToCategoriesValues(detailData);
    }

    sendMessageToCategoriesValues = (detail) => {
        document.dispatchEvent(new CustomEvent('j-event-components-values-common__values-set', {
            detail
        }));
    }
}

module.initModule('j-modules-pages-profile-routes-sale-offers-common-values-controller', ValuesController);
