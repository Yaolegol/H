import {Map2gisCommonBase} from 'views/components/map/2gis/common/base';
import './index.less';

const markerDataList = [
    {
        lat: 56.486932,
        lng: 84.944716,
        popupHtml: '<a href="/test">test</a>'
    },
    {
        lat: 56.486932,
        lng: 84.944716,
    },
    {
        lat: 56.486932,
        lng: 84.944716,
    },
    {
        lat: 56.486932,
        lng: 84.944716,
    },
    {
        lat: 56.453613,
        lng: 84.951289,
    },
    {
        lat: 56.453613,
        lng: 84.951289,
    },
    {
        lat: 56.453613,
        lng: 84.951289,
    },
];

class Map2gisComponentsAddMarker {
    constructor(element) {
        this.module = element;
        this.latInput = this.module.querySelector('.j-map-2gis-components-add-marker__lat-input');
        this.lngInput = this.module.querySelector('.j-map-2gis-components-add-marker__lng-input');

        this.initMap();
    }

    initMap = () => {
        this.mapInstance = new Map2gisCommonBase({
            center: [62.395570, 104.432320],
            markerDataList,
            onMapClick: this.onMapClick,
            zoom: 2
        });
    }

    onMapClick = (e) => {
        const {latlng} = e;
        const {lat, lng} = latlng;

        if(this.newMarker) {
            this.newMarker.removeFrom(this.mapInstance.map);
        }

        this.newMarker = this.mapInstance.addMarker({lat, lng});

        this.setLatLngInputsValues(lat, lng);
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
