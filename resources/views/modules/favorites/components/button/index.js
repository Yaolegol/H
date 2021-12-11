import {addEventListener} from 'helpers/events';
import './index.less';

class FavoritesButton {
    constructor(element) {
        this.module = element;
        this.id = this.module.dataset.id;
        this.button = this.module.querySelector('.j-favorites-components-button__button');

        addEventListener(this.button, 'click', this.handleClick);
    }

    handleClick = (e) => {
        console.log('this.id');
        console.log(this.id);

        const isActive = this.button.classList.contains('active');

        if(isActive) {
            this.button.classList.remove('active');
        } else {
            this.button.classList.add('active');
        }
    }
}

const list = [...document.querySelectorAll('.j-favorites-components-button')];

list.forEach((element) => {
    new FavoritesButton(element);
});
