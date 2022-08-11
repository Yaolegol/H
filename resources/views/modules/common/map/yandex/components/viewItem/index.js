import './index.less';

class MapYandexComponentsViewItem {
    constructor(element) {
        this.module = element;
        this.mapContainer = this.module.querySelector('.j-map-yandex-components-view-item__map-container');
        this.offerId = Number(this.module.dataset.offerId);

        this.init();
    }

    getBalloonContentLayoutClass = () => {
        return ymaps.templateLayoutFactory.createClass(
            '<div>Адрес:</div>' +
            '<div>{{ properties.address }}</div>' +
            '<div>Телефон:</div>' +
            '<div>{{ properties.phone }}</div>'
        );
    }

    fetchData = async () => {
        try {
            const result = await fetch(`/api/map/${this.offerId}`, {
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                method: 'GET',
            });

            const {data, errors} = await result.json();

            if(!errors) {
                this.offerData = data;

                window.ymaps.ready(() => {
                    this.initMap();
                });
            }
        } catch(err) {
            console.error(err);
        }
    }

    init = () => {
        this.fetchData();
    }

    initMap = () => {
        this.mapInstance = new ymaps.Map(this.mapContainer, {
            center: [62.395570, 104.432320],
            controls: ['zoomControl'],
            zoom: 2,
        });

        this.mapInstance.options.set('dragCursor', 'arrow');

        this.offerData.markersList.forEach(({data, markerCoords}) => {
            const {address, phone} = data;
            const {lat, lng} = markerCoords;

            const markerInstance = new ymaps.Placemark(
                [lat, lng],
                {
                    address,
                    phone,
                },
                {
                    balloonContentLayout: this.getBalloonContentLayoutClass(),
                },
            );
            this.mapInstance.geoObjects.add(markerInstance);
        });
    }
}

const list = [...document.querySelectorAll('.j-map-yandex-components-view-item')];

list.forEach((element) => {
    new MapYandexComponentsViewItem(element);
})
