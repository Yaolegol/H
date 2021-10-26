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
    }

    addInitialMarker = () => {
        if(this.markerLat && this.markerLng) {
            this.addMarker(this.markerLat, this.markerLng);
        }
    }

    addMarker = (lat, lng) => {
        if(this.newMarker) {
            this.newMarker.removeFrom(this.mapInstance.map);
        }

        this.newMarker = this.mapInstance.addMarker({lat, lng});

        this.setLatLngInputsValues(lat, lng);
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
        const {latlng} = e;
        const {lat, lng} = latlng;

        this.addMarker(lat, lng);
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
