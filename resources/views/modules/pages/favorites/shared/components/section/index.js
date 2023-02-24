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

                document.dispatchEvent(new CustomEvent('j-event-happened-get-favorites', {
                    detail: {
                        list: data,
                    }
                }))
            }
        } catch(err) {
            console.error(err);
        }
    }

    handleGetFavoritesProducts = () => {
        this.fetchData();
    }

    init = () => {
        this.fetchData()
    }
}

const list = [...document.querySelectorAll('.j-favorites-components-section')];

list.forEach((element) => {
    new FavoritesSection(element);
});
