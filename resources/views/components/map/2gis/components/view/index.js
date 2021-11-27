import {addEventListener} from "helpers/events";
import {Map2gisCommonBase} from 'views/components/map/2gis/common/base';
import './index.less';

class Map2gisComponentsView {
    constructor(element) {
        this.module = element;
        this.offerId = Number(this.module.dataset.offerId);

        this.init();
        this.bind();
    }

    addInitialMarker = () => {
        if(this.markerLat && this.markerLng) {
            this.addMarkerFromClick(this.markerLat, this.markerLng);
        }
    }

    addMarker = (lat, lng) => {
        return this.mapInstance.addMarker({lat, lng});
    }

    addMarkerFromClick = (lat, lng) => {
        this.removeMarkerFromClick();

        this.newMarkerFromClick = this.addMarker(lat, lng);

        this.setLatLngInputsValues(lat, lng);
    }

    bind = () => {
        addEventListener(document, 'j-event__need-update-map-marker', this.handleUpdateMarker);
    }

    handleUpdateMarker = (e) => {
        const {detail} = e;
        const {coords, isChecked, value} = detail;
        const {lat, lng} = coords;
    }

    init = () => {
        this.initMap();
        this.addInitialMarker();
    }

    initMap = () => {
        this.mapInstance = new Map2gisCommonBase({
            center: [62.395570, 104.432320],
            markerDataList: [],
            onMapClick: this.onMapClick,
            zoom: 2
        });
    }

    onMapClick = (e) => {
        const {latlng, originalEvent} = e;
        const {lat, lng} = latlng;

        const isClickOnMap = originalEvent.target.classList.contains('j-map-2gis-components-view__map-container');
    }
}

const list = [...document.querySelectorAll('.j-map-2gis-components-view')];

list.forEach((element) => {
    new Map2gisComponentsView(element);
})
