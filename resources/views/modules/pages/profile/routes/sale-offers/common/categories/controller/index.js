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

class CategoriesController {
    constructor(element) {
        console.log('CategoriesController constructor');

        this.module = element;

        this.bind();
    }

    bind = () => {
        addEventListener(this.module, 'click', this.handleClick);
    }

    handleClick = (e) => {
        console.log('CategoriesController handleClick');

        const target = e.target;
        const isButton = target.classList.contains('j-modules-pages-profile-routes-sale-offers-common-categories-controller__button');

        if(!isButton) {
            return;
        }

        this.sendMessage(target.dataset.id);
    }

    sendMessage = (id) => {
        document.dispatchEvent(new CustomEvent(CHANGE, {
            detail: {
                groupName: 'radio-group__catalog_level_one',
                value: id,
            }
        }));
    }
}

module.initModule('j-modules-pages-profile-routes-sale-offers-common-categories-controller', CategoriesController);
