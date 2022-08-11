import {addEventListener} from "helpers/events";
import './index.less';

class Map2gisComponentsAddMarker {
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
            this.addMarkerFromClick(this.markerLat, this.markerLng);
        }
    }

    addMarker = (lat, lng) => {

        this.setLatLngInputsValues(lat, lng);
    }

    addMarkerFromCheckbox = ({lat, lng, value}) => {
        const markerInstance = this.addMarker(lat, lng);

        this.checkboxesMap[value] = markerInstance;
    }

    bind = () => {
        addEventListener(document, 'j-event__need-update-map-marker', this.handleUpdateMarker);
        addEventListener(document, 'j-event-map__check-ready-status', this.handleCheckMapReadyStatus);
    }

    handleCheckMapReadyStatus = () => {
        this.sendInitMessage();
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
        this.checkboxesMap = {};

        ymaps.ready(() => {
            this.initMap();
            this.addInitialMarker();
        });

        // this.sendInitMessage();
    }

    initMap = () => {
        this.mapInstance = new ymaps.Map(this.mapContainer, {
            center: [62.395570, 104.432320],
            controls: ['zoomControl'],
            zoom: 2,
        });

        this.mapInstance.options.set('dragCursor', 'arrow');

        const TestBalloonContentLayoutClass = ymaps.templateLayoutFactory.createClass(
            '<h3>{{ properties.title }}</h3>' +
            '<p>{{ properties.description }}</p>'
        );

        this.mapInstance.events.add('click', (e) => {
            const coords = e.get('coords');

            console.log('coords');
            console.log(coords);

            if(this.marker) {
                this.mapInstance.geoObjects.remove(this.marker);
            }

            this.marker = new ymaps.Placemark(
                coords,
                {
                    title: 'title',
                    description: 'description',
                },
                {
                    balloonContentLayout: TestBalloonContentLayoutClass
                }
            );

            this.mapInstance.geoObjects.add(this.marker);
        });
    }

    removeMarkerFromCheckbox = (value) => {
        const markerInstance = this.checkboxesMap[value];

        if(markerInstance) {
            markerInstance.removeFrom(this.mapInstance.map);
        }
    }

    sendInitMessage = () => {
        document.dispatchEvent(new CustomEvent('j-event-map__ready'));
    }

    setLatLngInputsValues = (lat, lng) => {
        this.latInput.value = lat;
        this.lngInput.value = lng;
    }
}

const list = [...document.querySelectorAll('.j-map-yandex-components-add-marker')];

list.forEach((element) => {
    new Map2gisComponentsAddMarker(element);
})
