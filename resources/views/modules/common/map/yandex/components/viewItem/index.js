import {getOfferBalloonProductPage} from "views/modules/common/map/yandex/components/balloon/offer";
import './index.less';

class MapYandexComponentsViewItem {
    constructor(element) {
        this.module = element;
        this.mapContainer = this.module.querySelector('.j-map-yandex-components-view-item__map-container');
        this.offerId = Number(this.module.dataset.offerId);

        this.init();
    }

    getBalloonContentLayoutClass = (offerData) => {
        return ymaps.templateLayoutFactory.createClass(getOfferBalloonProductPage(offerData));
    };

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

                window.ymaps.ready(this.handleYMapsReady);
            }
        } catch(err) {
            console.error(err);
        }
    }

    handlePlacemarkClick = (e) => {
        const {originalEvent} = e;

        this.mapInstance.setCenter(originalEvent.target.geometry.getCoordinates(), 17, {
            duration: 1000,
        });
    }

    handleYMapsReady = () => {
        this.initMap();
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

        console.log('this.offerData')
        console.log(this.offerData)

        const {markersList, offer} = this.offerData;

        markersList.forEach(({id, markerCoords}) => {
            const {lat, lng} = markerCoords;

            const markerInstance = new ymaps.Placemark(
                [lat, lng],
                {
                    data: {
                        offer,
                    },
                    id,
                },
                {
                    balloonContentLayout: this.getBalloonContentLayoutClass(offer),
                },
            );

            markerInstance.events.add(['click'], this.handlePlacemarkClick);
            this.mapInstance.geoObjects.add(markerInstance);
        });
    }
}

const list = [...document.querySelectorAll('.j-map-yandex-components-view-item')];

list.forEach((element) => {
    new MapYandexComponentsViewItem(element);
})
