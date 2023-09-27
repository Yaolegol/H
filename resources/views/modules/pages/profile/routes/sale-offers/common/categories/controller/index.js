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
        this.initialSelectedList = this.module.dataset.initialSelectedList;
        this.hiddenInput = this.module.querySelector('.j-modules-pages-profile-routes-sale-offers-common-categories-controller__hidden-input');
        this.buttonsList = [...this.module.querySelectorAll('.j-modules-pages-profile-routes-sale-offers-common-categories-controller__button')];
        this.selectedCategoriesList = [];

        this.init();
        this.bind();
    }

    bind = () => {
        addEventListener(this.module, 'click', this.handleClick);
        addEventListener(document, 'j-event-components-inputs-radio-checkbox-group__change', this.handleClickSecondLevel);
    }

    buttonSelect = (button, id) => {
        button.classList.add('active');
        this.selectedCategoriesList.push(id);
        this.setHiddenInputValue();
    }

    buttonUnselect = (button, id) => {
        button.classList.remove('active');
        this.selectedCategoriesList = this.selectedCategoriesList.filter((selectedId) => selectedId !== id);
        this.setHiddenInputValue();
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
        }

        this.sendMessage(buttonId);
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

    init = () => {
        if(!this.initialSelectedList) {
            return;
        }

        this.initialSelectedList.split(',').forEach((id) => {
            const button = this.buttonsList.find((button) => {
                return button.dataset.id === id;
            });

            if(!button) {
                return;
            }

            this.buttonSelect(button, id);
        });
    }

    sendMessage = (id) => {
        document.dispatchEvent(new CustomEvent(CHANGE, {
            detail: {
                groupName: 'radio-group__catalog_level_one',
                value: id,
            }
        }));
    }

    setHiddenInputValue = () => {
        this.hiddenInput.checked = this.selectedCategoriesList.length > 0;
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
