import {addEventListener} from "helpers/events";
import {Map2gisCommonBase} from 'views/components/map/2gis/common/base';
import './index.less';

class Map2gisComponentsViewItem {
    constructor(element) {
        this.module = element;
        this.offerId = Number(this.module.dataset.offerId);

        this.init();
    }

    addMarker = (lat, lng, {address, phone}) => {
        const marker = this.mapInstance.addMarker({
            lat,
            lng,
        });

        marker.bindPopup(`
            <div class="map-2gis-components-view-item__marker-popup">
                <div>Адресс</div>
                <div>${address}</div>
                <div>Телефон</div>
                <div>${phone}</div>
            </div>
        `);
    }

    addMarkers = () => {
        this.offerData.markersList.forEach((makerData) => {
            const {data, markerCoords} = makerData;
            const {lat, lng} = markerCoords;
            const {address, phone} = data;

            this.addMarker(lat, lng, {
                address,
                phone
            });
        });
    }

    fetchData = async () => {
        try {
            const result = await fetch(`/api/map/${this.offerId}`, {
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                method: 'GET',
            });

            const {data, errors} = await result.json();

            if(!errors) {
                this.offerData = data;
                this.addMarkers();
            }
        } catch(err) {
            console.error(err);
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

const list = [...document.querySelectorAll('.j-map-2gis-components-view-item')];

list.forEach((element) => {
    new Map2gisComponentsViewItem(element);
})
