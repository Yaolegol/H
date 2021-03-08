import {addEventListener} from 'helpers/events';
import './index.less';

class Burger {
    constructor() {
        this.burger = document.querySelector('.j-burger');

        addEventListener(this.burger, 'click', this.handleClick);
    }

    handleClick = (e) => {
        this.burger.dispatchEvent(new CustomEvent('j-click'));
    }
}

new Burger();
