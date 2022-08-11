import {Map2gisCommonBase} from 'views/modules/common/map/2gis/common/base';
import './index.less';

class Map2gisComponentsViewItem {
    constructor(element) {
        this.module = element;
        this.mapContainer = this.module.querySelector('.j-map-2gis-components-view-item__map-container');
        this.offerId = Number(this.module.dataset.offerId);

        this.init();
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

                this.initMap();
            }
        } catch(err) {
            console.error(err);
        }
    }

    init = () => {
        this.fetchData();
    }

    initMap = () => {
        this.mapInstance = new Map2gisCommonBase({
            center: [62.395570, 104.432320],
            mapContainer: this.mapContainer,
            markerDataList: [this.offerData],
            useMarkerCluster: true,
            zoom: 2
        });
    }
}

const list = [...document.querySelectorAll('.j-map-2gis-components-view-item')];

list.forEach((element) => {
    new Map2gisComponentsViewItem(element);
})
