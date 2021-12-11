import {addEventListener} from 'helpers/events';
import './index.less';

class FavoritesButton {
    constructor(element) {
        this.module = element;
        this.id = Number(this.module.dataset.id);
        this.isUserLoggedIn = document.querySelector('.j-user__auth');
        this.button = this.module.querySelector('.j-favorites-components-button__button');

        this.bind();
    }

    activateButton = () => {
        this.button.classList.add('active');
    }

    bind = () => {
        addEventListener(document, 'j-event-happened-get-favorites', this.handleGetFavorites);
        addEventListener(this.button, 'click', this.handleClick);
    }

    handleClick = (e) => {
        console.log('this.id');
        console.log(this.id);

        if(this.isUserLoggedIn) {
            const isActive = this.button.classList.contains('active');

            console.log('isActive');
            console.log(isActive);

            if(isActive) {
                this.sendRequest('remove');
            } else {
                this.sendRequest('add');
            }
        }
    }

    handleGetFavorites = (e) => {
        const {detail} = e;
        const {list} = detail;

        list.forEach((offer) => {
            const {id} = offer;

            if(id === this.id) {
                this.activateButton();
            }
        })
    }

    sendRequest = async (action) => {
        try {
            const response = await fetch(`/api/favorites/product/${action}/${this.id}`, {
                headers: {
                    'Accept': 'application/json',
                },
                method: 'GET',
            });

            const {data, errors} = await response.json();

            if(!errors) {
                if(action === 'add') {
                    this.activateButton();
                } else {
                    this.button.classList.remove('active');
                }
            }

            console.log('data');
            console.log(data);
            console.log('errors');
            console.log(errors);
        } catch(err) {
            console.error(err);
        }
    }
}

const list = [...document.querySelectorAll('.j-favorites-components-button')];

list.forEach((element) => {
    new FavoritesButton(element);
});
