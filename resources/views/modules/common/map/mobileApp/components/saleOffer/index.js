import {addEventListener} from "helpers/events";
import './index.less';

class MapYandexComponentsSaleOffer {
    constructor(element) {
        this.module = element;
        this.mapContainer = this.module.querySelector('.j-map-mobile-app-components-sale-offer__map-container');

        this.init();
        this.addMobileAppFunctions();
    }

    addMarkerFromClick = (coords) => {
        if(this.marker) {
            this.removeMarkerFromMap(this.marker);
        }
        this.marker = this.addMarkerToMap(coords);
        this.sendMessageClick(coords);
    }

    addMarkerToMap = (coords) => {
        const markerInstance = new ymaps.Placemark(coords);
        this.mapInstance.geoObjects.add(markerInstance);

        return markerInstance;
    }

    addMarkerFromCheckbox = ({lat, lng, value}) => {
        this.checkboxesMap[value] = this.addMarkerToMap([lat, lng]);
    }

    addMobileAppFunctions = () => {
        this.addMobileAppFunctions_addMarkersList();
        this.addMobileAppFunctions_addMarkerFromCheckbox();
        this.addMobileAppFunction_zoomToUser();
    }

    addMobileAppFunctions_addMarkerFromCheckbox = () => {
        window.addMarkerFromCheckbox = (data) => {
            this.handleAddMapMarkerFromCheckbox(data);
        }
    }

    addMobileAppFunctions_addMarkersList = () => {
        window.addMarkersList = (list) => {
            this.handleAddMarkersList(list);
        }
    }

    addMobileAppFunction_zoomToUser = () => {
        window.zoomToUser = (latitude, longitude) => {
            this.zoomToUser(latitude, longitude);
        }
    }

    handleAddMapMarkerFromCheckbox = (data) => {
        const {lat, lng, isChecked, value} = data;

        if(isChecked) {
            this.addMarkerFromCheckbox({lat, lng, value});
        } else {
            this.removeMarkerFromCheckbox(value);
        }
    }

    handleAddMarkersList = (list) => {
        list.forEach((data) => {
            const {isSalePoint, lat, lng, value} = data;

            if(isSalePoint) {
                this.addMarkerFromCheckbox({lat, lng, value});
            } else {
                this.addMarkerFromClick([lat, lng]);
            }
        });
    }

    handleClickOnMap = (e) => {
        const coords = e.get('coords');

        this.addMarkerFromClick(coords);
    }

    init = () => {
        window.ymaps.ready(() => {
            this.checkboxesMap = {};

            this.initMap();
            this.sendMessageInit();
        });
    }

    initMap = () => {
        this.mapInstance = new ymaps.Map(this.mapContainer, {
            center: [62.395570, 104.432320],
            controls: ['zoomControl'],
            zoom: 2,
        });

        this.mapInstance.options.set('dragCursor', 'arrow');

        this.mapInstance.events.add('click', this.handleClickOnMap);
    }

    removeMarkerFromCheckbox = (value) => {
        const markerInstance = this.checkboxesMap[value];

        if(markerInstance) {
            this.removeMarkerFromMap(markerInstance);
        }
    }

    removeMarkerFromMap = (markerInstance) => {
        this.mapInstance.geoObjects.remove(markerInstance);
    }

    sendMessageClick = (coords) => {
        this.sendMessageToMobileApp({
            data: {
                coords,
            },
            event: 'MOBILE_APP__EVENTS__CLICK',
        });
    }

    sendMessageInit = () => {
        this.sendMessageToMobileApp({
            event: 'MOBILE_APP__EVENTS__MAP-INIT',
        });
    }

    sendMessageToMobileApp = ({data, event}) => {
        if(!window.MOBILE_APP__EVENTS) {
            return;
        }

        window.MOBILE_APP__EVENTS.postMessage(JSON.stringify({
            data,
            type: event
        }));
    }

    zoomToUser = (latitude, longitude) => {
        this.mapInstance.setCenter([latitude, longitude], 11, {
            duration: 1000,
        });
    }
}

const list = [...document.querySelectorAll('.j-map-mobile-app-components-sale-offer')];

list.forEach((element) => {
    new MapYandexComponentsSaleOffer(element);
})
