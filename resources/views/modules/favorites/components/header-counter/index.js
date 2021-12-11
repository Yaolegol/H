import {addEventListener} from 'helpers/events';

class FavoritesHeaderCounter {
    constructor(element) {
        this.module = element;
        this.countContainer = this.module.querySelector('.j-favorites-components-header-counter__count');

        this.bind();
    }

    bind = () => {
        addEventListener(document, 'j-event-happened-get-favorites', this.handleGetFavorites);
    }

    handleGetFavorites = (e) => {
        const {detail} = e;
        const {list} = detail;
        const count = list.length;

        if(count) {
            this.module.classList.add('active');
            this.countContainer.innerHTML = count;
        }
    }
}

const list = [...document.querySelectorAll('.j-favorites-components-header-counter')];

list.forEach((element) => {
    new FavoritesHeaderCounter(element);
});
