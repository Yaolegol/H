import {getCookieData} from "helpers/cookie";
import {addEventListener} from "helpers/events";
import {getQueryData} from "helpers/query";
import {Map2gisCommonBase} from 'views/components/map/2gis/common/base';
import './index.less';

class Map2gisComponentsViewAll {
    constructor(element) {
        this.module = element;
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
        console.log('fetchData {{{')
        try {
            const cookieData = getCookieData();
            const {catalogLevelTwoId} = getQueryData();

            console.log('cookieData')
            console.log(cookieData)

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

            const data = await result.json();

            console.log('}}} fetchData')

            return data;
        } catch(err) {
            console.error(err);
        }
    }

    handleUpdateMapFilter = async (e) => {
        const {data, errors} = await this.fetchData();

        console.log('handleUpdateMapFilter {{{')
        console.log('data')
        console.log(data)
        console.log('errors')
        console.log(errors)
        console.log('}}} handleUpdateMapFilter')

        if(!errors) {
            this.offerData = data;
        }
    }

    init = async () => {
        const {data, errors} = await this.fetchData();

        console.log('init {{{')
        console.log('data')
        console.log(data)
        console.log('errors')
        console.log(errors)
        console.log('}}} init')

        if(!errors) {
            this.offerData = data;

            this.initMap();
        }
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
