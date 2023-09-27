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

const otherButtonId = '999';

class CategoriesController {
    constructor(element) {
        this.module = element;
        this.hiddenInput = this.module.querySelector('.j-modules-pages-profile-routes-sale-offers-common-categories-controller__hidden-input');
        this.buttonsList = [...this.module.querySelectorAll('.j-modules-pages-profile-routes-sale-offers-common-categories-controller__button')];
        this.inputsList = [...this.module.querySelectorAll('.j-modules-pages-profile-routes-sale-offers-common-categories-controller__input')];
        this.selectedCategoriesList = [];

        this.bind();
    }

    bind = () => {
        addEventListener(this.module, 'click', this.handleClick);
        addEventListener(document, 'j-event-components-inputs-radio-checkbox-group__change', this.handleClickSecondLevel);
    }

    buttonSelect = (button, id) => {
        button.classList.add('active');
        this.selectedCategoriesList.push(id);
    }

    buttonUnselect = (button, id) => {
        button.classList.remove('active');
        this.selectedCategoriesList = this.selectedCategoriesList.filter((selectedId) => selectedId !== id);
    }

    checkIsSelectedIdExists = (id) => {
        return this.selectedCategoriesList.includes(id);
    }

    handleClick = (e) => {
        const target = e.target;
        const isButton = target.classList.contains('j-modules-pages-profile-routes-sale-offers-common-categories-controller__button');

        if(!isButton) {
            return;
        }

        const buttonId = target.dataset.id;

        if(buttonId === otherButtonId) {
            this.toggleOtherButton(target);

            return;
        }

        this.sendMessage(target.dataset.id);
    }

    handleClickSecondLevel = (e) => {
        const {id, hasCheckedInput} = e.detail;

        const button = this.buttonsList.find((button) => {
            return button.dataset.id === id;
        });

        if(!button) {
            return;
        }

        if(hasCheckedInput) {
            this.buttonSelect(button, id);
        } else {
            this.buttonUnselect(button, id);
        }
    }

    sendMessage = (id) => {
        document.dispatchEvent(new CustomEvent(CHANGE, {
            detail: {
                groupName: 'radio-group__catalog_level_one',
                value: id,
            }
        }));
    }

    toggleOtherButton = (button) => {
        const isSelected = this.checkIsSelectedIdExists(otherButtonId);

        if(isSelected) {
            this.buttonUnselect(button, otherButtonId);
        } else {
            this.buttonSelect(button, otherButtonId);
        }
    }
}

module.initModule('j-modules-pages-profile-routes-sale-offers-common-categories-controller', CategoriesController);
