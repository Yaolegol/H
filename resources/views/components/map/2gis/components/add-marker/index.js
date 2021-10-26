import {addEventListener} from "helpers/events";
import {Map2gisCommonBase} from 'views/components/map/2gis/common/base';
import './index.less';

class Map2gisComponentsAddMarker {
    constructor(element) {
        this.module = element;
        this.latInput = this.module.querySelector('.j-map-2gis-components-add-marker__lat-input');
        this.lngInput = this.module.querySelector('.j-map-2gis-components-add-marker__lng-input');
        this.markerLat = Number(this.module.dataset.markerLat);
        this.markerLng = Number(this.module.dataset.markerLng);

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
        if(this.newMarkerFromClick) {
            this.newMarkerFromClick.removeFrom(this.mapInstance.map);
        }

        this.newMarkerFromClick = this.addMarker(lat, lng);

        this.setLatLngInputsValues(lat, lng);
    }

    addMarkerFromCheckbox = ({lat, lng, value}) => {
        const markerInstance = this.addMarker(lat, lng);

        this.checkboxesMap[value] = markerInstance;
    }

    bind = () => {
        addEventListener(document, 'j-event__need-update-map-marker', this.handleUpdateMarker);
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
        const {latlng} = e;
        const {lat, lng} = latlng;

        this.addMarkerFromClick(lat, lng);
    }

    removeMarkerFromCheckbox = (value) => {
        const markerInstance = this.checkboxesMap[value];

        if(markerInstance) {
            markerInstance.removeFrom(this.mapInstance.map);
        }
    }

    setLatLngInputsValues = (lat, lng) => {
        this.latInput.value = lat;
        this.lngInput.value = lng;
    }
}

const list = [...document.querySelectorAll('.j-map-2gis-components-add-marker')];

list.forEach((element) => {
    new Map2gisComponentsAddMarker(element);
})
