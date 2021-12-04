import {getCookieData} from "helpers/cookie";
import {addEventListener} from "helpers/events";
import {Map2gisCommonBase} from 'views/components/map/2gis/common/base';
import './index.less';

class Map2gisComponentsViewAll {
    constructor(element) {
        this.module = element;

        this.init();
    }

    fetchData = async () => {
        try {
            const cookieData = getCookieData();

            console.log('cookieData!!!')
            console.log(cookieData)

            const result = await fetch('/api/map', {
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
        this.instanceOfMap2gisCommonBase = new Map2gisCommonBase({
            center: [62.395570, 104.432320],
            markerDataList: this.offerData,
            onMapClick: this.onMapClick,
            useMarkerCluster: true,
            zoom: 2
        });
    }
}

const list = [...document.querySelectorAll('.j-map-2gis-components-view-all')];

list.forEach((element) => {
    new Map2gisComponentsViewAll(element);
})
