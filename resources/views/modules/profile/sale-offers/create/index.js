import {Map2gis} from 'views/modules/map2gis';
import 'views/components/inputs/radio/content-group';
import 'views/components/inputs/radio/group';
import 'views/components/inputs/radio/group';
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

let newMarker;

const onMapClick = (e) => {
    const {lat, lng} = e.latlng;

    if(newMarker) {
        newMarker.removeFrom(mapInstance.map);
    }

    newMarker = mapInstance.addMarker({lat, lng});
}

const mapInstance = new Map2gis({
    center: [62.395570, 104.432320],
    markerDataList,
    onMapClick,
    zoom: 2
});
