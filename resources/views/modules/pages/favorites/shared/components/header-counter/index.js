import {addEventListener} from 'helpers/events';

class FavoritesHeaderCounter {
    constructor(element) {
        this.module = element;
        this.countContainer = this.module.querySelector('.j-favorites-components-header-counter__count');
        this.count = 0;

        this.bind();
    }

    bind = () => {
        addEventListener(document, 'j-event-happened-get-favorites', this.handleGetFavorites);
        addEventListener(document, 'j-event-happened-update-favorites', this.handleUpdateFavorites);
    }

    handleGetFavorites = (e) => {
        const {detail} = e;
        const {list} = detail;
        this.count = list.length;

        this.updateCounter();
    }

    handleUpdateFavorites = (e) => {
        const {detail} = e;
        const {action} = detail;

        if(action === 'add') {
            this.count++;
            this.updateCounter();
        } else {
            this.count--;
            this.updateCounter();
        }
    }

    updateCounter = () => {
        if(this.count) {
            this.module.classList.add('active');
            this.countContainer.innerHTML = this.count;
        } else {
            this.module.classList.remove('active');
            this.countContainer.innerHTML = '';
        }
    }
}

const list = [...document.querySelectorAll('.j-favorites-components-header-counter')];

list.forEach((element) => {
    new FavoritesHeaderCounter(element);
});
