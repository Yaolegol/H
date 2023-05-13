import {addEventListener} from "helpers/events";

class FavoritesSection {
    constructor(element) {
        this.module = element;
        this.isUserLoggedIn = document.querySelector('.j-user__auth');

        if(this.isUserLoggedIn) {
            this.init();
            this.bind();
        }
    }

    bind = () => {
        addEventListener(document, 'j-event-favorites-components-section__get-favorites-products', this.handleGetFavoritesProducts);
        addEventListener(document, 'j-event-favorites-components-section__update-favorites-products', this.handleUpdateFavoritesProducts);
    }

    fetchData = async () => {
        try {
            const response = await fetch(`/favorites/products`, {
                headers: {
                    'Accept': 'application/json',
                },
                method: 'GET',
            });

            const {data, errors} = await response.json();

            if(!errors) {
                this.data = data;

                this.sendFavoritesData();
            }
        } catch(err) {
            console.error(err);
        }
    }

    handleGetFavoritesProducts = (e) => {
        const {fromMemory = false} = e.detail;

        if(fromMemory) {
            this.sendFavoritesData();

            return;
        }

        this.fetchData();
    }

    handleUpdateFavoritesProducts = (e) => {
        const {list} = e.detail;

        console.log('list')
        console.log(list)

        this.data = list;
    }

    init = () => {
        this.fetchData()
    }

    sendFavoritesData = () => {
        document.dispatchEvent(new CustomEvent('j-event-happened-get-favorites', {
            detail: {
                list: this.data,
            }
        }))
    }
}

const list = [...document.querySelectorAll('.j-favorites-components-section')];

list.forEach((element) => {
    new FavoritesSection(element);
});
