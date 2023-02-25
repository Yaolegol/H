import {addEventListener} from "helpers/events";
import './index.less';

class MapYandexComponentsAddMarker {
    constructor(element) {
        this.module = element;
        this.mapContainer = this.module.querySelector('.j-map-yandex-components-add-marker__map-container');
        this.latInput = this.module.querySelector('.j-map-yandex-components-add-marker__lat-input');
        this.lngInput = this.module.querySelector('.j-map-yandex-components-add-marker__lng-input');
        this.markerLat = Number(this.module.dataset.markerLat);
        this.markerLng = Number(this.module.dataset.markerLng);

        this.bind();
        this.init();
    }

    addInitialMarker = () => {
        if(this.markerLat && this.markerLng) {
            this.addMarkerFromClick([this.markerLat, this.markerLng]);
        }
    }

    addMarkerFromClick = (coords) => {
        if(this.marker) {
            this.removeMarkerFromMap(this.marker);
        }
        this.marker = this.addMarkerToMap(coords);
        this.setLatLngInputsValues(coords);
    }

    addMarkerToMap = (coords) => {
        const markerInstance = new ymaps.Placemark(coords);
        this.mapInstance.geoObjects.add(markerInstance);

        return markerInstance;
    }

    addMarkerFromCheckbox = ({lat, lng, value}) => {
        this.checkboxesMap[value] = this.addMarkerToMap([lat, lng]);
    }

    bind = () => {
        addEventListener(document, 'j-event__need-update-map-marker', this.handleUpdateMarker);
        addEventListener(document, 'j-event-map__check-ready-status', this.handleCheckMapReadyStatus);
        addEventListener(document, 'j-event-modules-common-geo-components-button__update-geo', this.handleUpdateGeo);
    }

    handleCheckMapReadyStatus = () => {
        this.sendInitMessage();
    }

    handleClickOnMap = (e) => {
        const coords = e.get('coords');

        this.addMarkerFromClick(coords);
    }

    handleUpdateGeo = (e) => {
        this.geo = e.detail.position;

        this.showGeoCoordinates();
    }

    handleUpdateMarker = (e) => {
        const {detail} = e;
        const {coords, isChecked, value} = detail;
        const {lat, lng} = coords;

        if(isChecked) {
            this.addMarkerFromCheckbox({lat, lng, value});
        } else {
            this.removeMarkerFromCheckbox(value);
        }
    }

    init = () => {
        window.ymaps.ready(() => {
            this.checkboxesMap = {};

            this.initMap();
            this.addInitialMarker();
            this.sendInitMessage();
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

    sendInitMessage = () => {
        document.dispatchEvent(new CustomEvent('j-event-map__ready'));
    }

    setLatLngInputsValues = ([lat, lng]) => {
        this.latInput.value = lat;
        this.lngInput.value = lng;
    }

    showGeoCoordinates = () => {
        const {coords} = this.geo;
        const {latitude, longitude} = coords;

        this.mapInstance.setCenter([latitude, longitude], 15, {
            duration: 1000,
        });
    }
}

const list = [...document.querySelectorAll('.j-map-yandex-components-add-marker')];

list.forEach((element) => {
    new MapYandexComponentsAddMarker(element);
})
