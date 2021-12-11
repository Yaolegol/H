import {addEventListener} from 'helpers/events';
import './index.less';

class FavoritesButton {
    constructor(element) {
        this.module = element;
        this.id = this.module.dataset.id;
        this.isUserLoggedIn = document.querySelector('.j-user__auth');
        this.button = this.module.querySelector('.j-favorites-components-button__button');

        addEventListener(this.button, 'click', this.handleClick);
    }

    handleClick = (e) => {
        console.log('this.id');
        console.log(this.id);

        if(this.isUserLoggedIn) {
            const isActive = this.button.classList.contains('active');

            if(isActive) {
                this.sendRequest('add');
            } else {
                this.sendRequest('remove');
            }
        }
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
                    this.button.classList.remove('active');
                } else {
                    this.button.classList.add('active');
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
