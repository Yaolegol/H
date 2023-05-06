import {addEventListener} from "helpers/events";
import './index.less';

class RatingStars {
    constructor(element) {
        this.module = element;
        this.hiddenInput = this.module.querySelector('.j-components-rating-common-stars__input');
        this.defaultValue = Number(this.module.dataset.defaultValue);
        this.buttonsList = [...this.module.querySelectorAll('.j-components-rating-common-stars__button')];
        this.activeButton = null;

        this.init();
        this.bind();
    }

    bind = () => {
        this.buttonsList.forEach((button) => {
            addEventListener(button, 'click', this.handleButtonClick);
        });
    }

    handleButtonClick = (e) => {
        this.setActiveButton(e);

        this.hiddenInput.value = e.currentTarget.dataset.value;
    }

    init = () => {
        this.activeButton = this.buttonsList[this.defaultValue - 1];
        this.activeButton.classList.add('active');
    }

    setActiveButton = (e) => {
        if(this.activeButton) {
            this.activeButton.classList.remove('active');
        }

        this.activeButton = e.currentTarget;
        this.activeButton.classList.add('active');
    }
}

const list = [...document.querySelectorAll('.j-components-rating-common-stars')];

list.forEach((element) => {
    new RatingStars(element);
});
