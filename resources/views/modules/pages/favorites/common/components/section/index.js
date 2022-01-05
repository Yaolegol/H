class FavoritesSection {
    constructor(element) {
        this.module = element;
        this.isUserLoggedIn = document.querySelector('.j-user__auth');

        if(this.isUserLoggedIn) {
            this.init();
        }
    }

    fetchData = async () => {
        try {
            const response = await fetch(`/api/favorites/products`, {
                headers: {
                    'Accept': 'application/json',
                },
                method: 'GET',
            });

            const {data, errors} = await response.json();

            if(!errors) {
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

    init = () => {
        this.fetchData()
    }
}

const list = [...document.querySelectorAll('.j-favorites-components-section')];

list.forEach((element) => {
    new FavoritesSection(element);
});
