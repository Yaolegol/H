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
        addEventListener(document, 'j-event--select-map-filter', this.handleSelectMapFilter)
    }

    fetchData = async () => {
        try {
            const cookieData = getCookieData();
            const queryData = getQueryData();

            console.log('cookieData')
            console.log(cookieData)

            console.log('queryData')
            console.log(queryData)

            const bodyData = {
                filter: {
                    catalog: {
                        levelOneId: 1,
                        levelTwoId: 1,
                    },
                    location: {
                        city: cookieData['search-city-id'],
                        country: cookieData['search-country-id'],
                        region: cookieData['search-region-id'],
                    },
                }
            };

            console.log('bodyData')
            console.log(bodyData)

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

            const {data, errors} = await result.json();

            if(!errors) {
                this.offerData = data;

                // this.initMap();
            }
        } catch(err) {
            console.error(err);
        }
    }

    handleSelectMapFilter = (e) => {
        const {detail} = e;
        const {categoryLevelTwoId} = detail;

        console.log('!!! handleSelectMapFilter categoryLevelTwoId')
        console.log(categoryLevelTwoId)
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
