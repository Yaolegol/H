import {Map2gisCommonBase} from 'views/modules/common/map/2gis/common/base';
import './index.less';

class Map2gisComponentsShowMarker {
    constructor(element) {
        this.module = element;
        this.mapContainer = this.module.querySelector('.j-map-2gis-components-show-marker__map-container');
        this.markerLat = Number(this.module.dataset.markerLat);
        this.markerLng = Number(this.module.dataset.markerLng);

        this.initMap();
    }

    initMap = () => {
        this.mapInstance = new Map2gisCommonBase({
            center: [62.395570, 104.432320],
            mapContainer: this.mapContainer,
            markerDataList: [],
            zoom: 2
        });

        this.mapInstance.addMarker({
            lat: this.markerLat,
            lng: this.markerLng,
        });
    }
}

const list = [...document.querySelectorAll('.j-map-2gis-components-show-marker')];

list.forEach((element) => {
    new Map2gisComponentsShowMarker(element);
})
