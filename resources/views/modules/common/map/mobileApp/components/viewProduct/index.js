import {getOfferBalloon_mobileApp_viewProduct} from "views/modules/common/map/mobileApp/components/balloon/offer/viewProduct";
import './index.less';

class MapMobileAppComponentsViewProduct {
    constructor(element) {
        this.module = element;
        this.mapContainer = this.module.querySelector('.j-modules-common-map-mobile-app-components-view-product__map-container');
        this.offerId = Number(this.module.dataset.offerId);

        this.init();
    }

    getBalloonContentLayoutClass = (offerData, markerId) => {
        const balloonContentLayout = ymaps.templateLayoutFactory.createClass(
            getOfferBalloon_mobileApp_viewProduct(offerData, markerId),
            {
                build: function() {
                    // Сначала вызываем метод build родительского класса.
                    balloonContentLayout.superclass.build.call(this);

                    const phone = this.customGetPhone();

                    if(!phone) {
                        return;
                    }

                    phone.addEventListener('click', this.handleClickPhone);
                },
                clear: function() {
                    // Выполняем действия в обратном порядке - сначала снимаем слушателя,
                    // а потом вызываем метод clear родительского класса.
                    const phone = this.customGetPhone();

                    if(phone) {
                        phone.removeEventListener('click', this.handleClickPhone);
                    }

                    balloonContentLayout.superclass.clear.call(this);
                },
                handleClickPhone: function(e) {
                    if(!window.MOBILE_APP__EVENTS) {
                        return;
                    }

                    const {phone} = e.currentTarget.dataset;

                    window.MOBILE_APP__EVENTS.postMessage(JSON.stringify({
                        data: {
                            phone,
                        },
                        type: 'MOBILE_APP__EVENTS__BALLOON__CLICK-PHONE'
                    }));
                },
                customGetBalloon: function() {
                    return document.querySelector('.j-modules-common-map-mobile-app-components-balloon-offer-view-product');
                },
                customGetPhone: function() {
                    const balloon = this.customGetBalloon();

                    if(!balloon) {
                        return;
                    }

                    return balloon.querySelector('.j-modules-common-map-mobile-app-components-balloon-offer-view-product__phone');
                },
            }
        );

        return balloonContentLayout;
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

        if(!markersList.length) {
            return;
        }

        this.mapCluster = new ymaps.Clusterer();
        const placemarks = [];

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
                    balloonContentLayout: this.getBalloonContentLayoutClass(offer, id.toString()),
                },
            );

            markerInstance.events.add(['click'], this.handlePlacemarkClick);
            placemarks.push(markerInstance);
        });

        this.mapCluster.add(placemarks);
        this.mapInstance.geoObjects.add(this.mapCluster);
    }
}

const list = [...document.querySelectorAll('.j-modules-common-map-mobile-app-components-view-product')];

list.forEach((element) => {
    new MapMobileAppComponentsViewProduct(element);
})
