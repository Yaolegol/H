import {Map2gisBase} from 'views/components/map/2gis/base';
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

class Map2gisAddMarker {
    constructor(element) {
        this.module = element;

        this.initMap();
    }

    initMap = () => {
        this.mapInstance = new Map2gisBase({
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
    }
}

const list = [...document.querySelectorAll('.j-map-2gis-add-marker')];

list.forEach((element) => {
    new Map2gisAddMarker(element);
})
