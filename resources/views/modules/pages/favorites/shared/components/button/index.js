import {PATH} from "constants/path";
import {addEventListener} from 'helpers/events';
import './index.less';

const {FAVORITES} = PATH;

class FavoritesButton {
    constructor(element) {
        this.module = element;
        this.id = Number(this.module.dataset.id);
        this.isUserLoggedIn = document.querySelector('.j-user__auth');
        this.button = this.module.querySelector('.j-favorites-components-button__button');

        if(!this.isUserLoggedIn) {
            return;
        }

        this.bind();
    }

    activateButton = () => {
        this.button.classList.add('active');
    }

    bind = () => {
        addEventListener(document, 'j-event-happened-get-favorites', this.handleGetFavorites);
        addEventListener(this.button, 'click', this.handleClick);
    }

    checkIsNeedReloadPage = () => {
        if(window.location.pathname === FAVORITES) {
            window.location.reload();
        }
    }

    handleClick = (e) => {
        const isActive = this.button.classList.contains('active');

        if(isActive) {
            this.sendRequest('remove');
        } else {
            this.sendRequest('add');
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
            const response = await fetch(`/favorites/products/${action}/${this.id}`, {
                headers: {
                    'Accept': 'application/json',
                },
                method: 'GET',
            });

            const {data, errors} = await response.json();

            if(!errors) {
                if(action === 'add') {
                    this.activateButton();
                    this.sendUpdateMessage(action);
                } else {
                    this.button.classList.remove('active');
                    this.sendUpdateMessage(action);
                }

                this.checkIsNeedReloadPage();
            }
        } catch(err) {
            console.error(err);
        }
    }

    sendUpdateMessage = (action) => {
        document.dispatchEvent(new CustomEvent('j-event-happened-update-favorites', {
            detail: {
                action,
            }
        }))
    }
}

const list = [...document.querySelectorAll('.j-favorites-components-button')];

list.forEach((element) => {
    new FavoritesButton(element);
});
