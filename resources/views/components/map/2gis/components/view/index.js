import {addEventListener} from "helpers/events";
import {Map2gisCommonBase} from 'views/components/map/2gis/common/base';
import './index.less';

class Map2gisComponentsView {
    constructor(element) {
        this.module = element;
        this.offerId = Number(this.module.dataset.offerId);

        this.init();
    }

    addMarker = (lat, lng) => {
        return this.mapInstance.addMarker({lat, lng});
    }

    addMarkers = () => {
        this.offerData.markersList.forEach((makerData) => {
            const {markerCoords} = makerData;
            const {lat, lng} = markerCoords;

            this.addMarker(lat, lng);
        });
    }

    fetchData = async () => {
        const result = await fetch(`/api/map/${this.offerId}`, {
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            method: 'GET',
        });

        console.log('result')
        console.log(result)

        const {data, errors} = await result.json();

        console.log('data')
        console.log(data)

        if(!errors) {
            this.offerData = data;
            this.addMarkers();
        }
    }

    init = () => {
        this.initMap();
        this.fetchData();
    }

    initMap = () => {
        this.mapInstance = new Map2gisCommonBase({
            center: [62.395570, 104.432320],
            markerDataList: [],
            onMapClick: this.onMapClick,
            zoom: 2
        });
    }
}

const list = [...document.querySelectorAll('.j-map-2gis-components-view')];

list.forEach((element) => {
    new Map2gisComponentsView(element);
})
