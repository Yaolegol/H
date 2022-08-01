import {getCookieData} from "helpers/cookie";
import {addEventListener} from "helpers/events";
import {getQueryData} from "helpers/query";
import {Map2gisCommonBase} from 'views/modules/common/map/2gis/common/base';
import './index.less';

class Map2gisComponentsViewAll {
    constructor(element) {
        this.module = element;
        this.mapContainer = this.module.querySelector('.j-map-2gis-components-view-all__map-container');
        this.tokenCSRFInput = this.module.querySelector('input[name="_token"]');
        this.tokenCSRFValue = this.tokenCSRFInput.value;

        if(!this.tokenCSRFValue) {
            console.error('no csrf token found');

            return;
        }

        this.init();
        this.bind();
    }

    bind = () => {
        addEventListener(document, 'j-event--map-filter-update', this.handleUpdateMapFilter)
    }

    fetchData = async () => {
        try {
            const cookieData = getCookieData();
            const {catalogLevelTwoId} = getQueryData();

            const bodyData = {
                filter: {
                    catalog: {
                        levelTwoId: catalogLevelTwoId ?? null,
                    },
                    location: {
                        city: cookieData['search-city-id'] ?? null,
                        country: cookieData['search-country-id'] ?? null,
                        region: cookieData['search-region-id'] ?? null,
                    },
                }
            };

            const body = JSON.stringify(bodyData);

            const result = await fetch('/api/map', {
                body,
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': this.tokenCSRFValue,
                },
                method: 'POST',
            });

            return result.json();
        } catch(err) {
            console.error(err);
        }
    }

    handleUpdateMapFilter = async (e) => {
        const {data, errors} = await this.fetchData();

        if(!errors) {
            this.offerData = data;

            this.instanceOfMap2gisCommonBase.clearClusterGroup();
            this.instanceOfMap2gisCommonBase.initMarkers({
                markerDataList: this.offerData,
                useMarkerCluster: true,
            });
        }
    }

    init = async () => {
        const {data, errors} = await this.fetchData();

        if(!errors) {
            this.offerData = data;

            this.initMap();
        }
    }

    initMap = () => {
        this.instanceOfMap2gisCommonBase = new Map2gisCommonBase({
            center: [62.395570, 104.432320],
            mapContainer: this.mapContainer,
            markerDataList: this.offerData,
            useMarkerCluster: true,
            zoom: 3,
        });
    }
}

const list = [...document.querySelectorAll('.j-map-2gis-components-view-all')];

list.forEach((element) => {
    new Map2gisComponentsViewAll(element);
})
