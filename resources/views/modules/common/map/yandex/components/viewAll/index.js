import {getCookieData} from "helpers/cookie";
import {addEventListener} from "helpers/events";
import {getQueryData} from "helpers/query";
import {getOfferBalloon} from "views/modules/common/map/yandex/components/balloon/offer";
import './index.less';

class MapYandexComponentsViewAll {
    constructor(element) {
        this.module = element;
        this.mapContainer = this.module.querySelector('.j-map-yandex-components-view-all__map-container');
        this.tokenCSRFInput = this.module.querySelector('input[name="_token"]');
        this.tokenCSRFValue = this.tokenCSRFInput.value;

        if(!this.tokenCSRFValue) {
            console.error('no csrf token found');

            return;
        }

        this.init();
        this.bind();
    }

    addMarkersToMap = () => {
        this.mapCluster = new ymaps.Clusterer();
        const placemarks = [];

        this.offerData.forEach(({markersList, offer}) => {
            console.log('offer')
            console.log(offer)

            markersList.forEach(({id, markerCoords}) => {
                const {lat, lng} = markerCoords;

                const markerInstance = new ymaps.Placemark(
                    [lat, lng],
                    {
                        data: {
                            offer,
                        },
                        id,
                    },
                    {
                        balloonContentLayout: this.getBalloonContentLayoutClass(offer),
                    },
                );

                placemarks.push(markerInstance);
            });
        });

        this.mapCluster.add(placemarks);
        this.mapInstance.geoObjects.add(this.mapCluster);
    }

    bind = () => {
        addEventListener(document, 'j-event--map-filter-update', this.handleUpdateMapFilter);
        addEventListener(document, 'j-event-map__show-placemark', this.handleShowPlacemark);
        addEventListener(document, 'j-event-modules-common-geo-components-button__update-geo', this.handleUpdateGeo);
        addEventListener(document, 'j-event-map-yandex-components-view-all__get-visible-markers-data', this.handleGetVisibleMarkerData)
    }

    bindMapEvents = () => {
        this.mapInstance.events.add(['boundschange'], this.handleMapBoundsChange);
    }

    getPlacemarksDataList = () => {
        const list = [];
        const geoQueryResultInstance = ymaps.geoQuery(this.mapCluster.getGeoObjects()).searchInside(this.mapInstance);

        geoQueryResultInstance.each((placemark) => {
            list.push({
                placemark: {
                    id: placemark.properties.get('id'),
                },
                placemarkData: placemark.properties.get('data'),
            });
        });

        return list;
    }

    handleGetVisibleMarkerData = () => {
        const list = this.getPlacemarksDataList();

        document.dispatchEvent(new CustomEvent('j-event-map-yandex-components-view-all__get-visible-markers-data-complete', {
            detail: {
                list,
            }
        }));
    }

    handleMapBoundsChange = () => {
        this.updatePlacemarsDataList();
    }

    handleShowPlacemark = (e) => {
        const geoQueryResult = ymaps.geoQuery(this.mapCluster.getGeoObjects());
        const geoQueryResultPlacemarks = geoQueryResult.search(`properties.id = "${e.detail.placemarkId}"`);

        this.mapInstance.setCenter(geoQueryResultPlacemarks.get(0).geometry.getCoordinates(), 17, {
            duration: 1000,
        });
    }

    handleUpdateGeo = (e) => {
        this.geo = e.detail.position;

        this.showGeoCoordinates();
    }

    fetchData = async () => {
        try {
            const cookieData = getCookieData();
            const {catalogLevelOneId, catalogLevelTwoId} = getQueryData();

            const bodyData = {
                filter: {
                    catalog: {
                        levelOneId: catalogLevelOneId ?? null,
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

    getBalloonContentLayoutClass = (offerData) => {
        return ymaps.templateLayoutFactory.createClass(getOfferBalloon(offerData));
    };

    handleUpdateMapFilter = async (e) => {
        const {data, errors} = await this.fetchData();

        if(!errors) {
            this.offerData = data;

            this.mapInstance.geoObjects.remove(this.mapCluster);
            this.addMarkersToMap();

            const list = this.getPlacemarksDataList();

            this.sendPlacemarksDataListUpdateEvent({list});
        }
    }

    handleYMapsReady = () => {
        this.initMap();
        this.addMarkersToMap();
        this.bindMapEvents();
        this.updatePlacemarsDataList();

        if(this.geo) {
            this.showGeoCoordinates();
        }
    }

    init = async () => {
        const {data, errors} = await this.fetchData();

        if(!errors) {
            this.offerData = data;

            window.ymaps.ready(this.handleYMapsReady);
        }
    }

    initMap = () => {
        this.mapInstance = new ymaps.Map(this.mapContainer, {
            center: [33, 84],
            controls: ['zoomControl'],
            zoom: 2,
        });

        this.mapInstance.options.set('dragCursor', 'arrow');
    }

    sendPlacemarksDataListUpdateEvent = ({list}) => {
        document.dispatchEvent(new CustomEvent('j-event-map-yandex-components-view-all__update-visible-markers-data', {
            detail: {
                list,
            }
        }));
    }

    showGeoCoordinates = () => {
        const {coords} = this.geo;
        const {latitude, longitude} = coords;

        this.mapInstance.setCenter([latitude, longitude], 15, {
            duration: 1000,
        });
    }

    updatePlacemarsDataList = () => {
        const list = this.getPlacemarksDataList();

        this.sendPlacemarksDataListUpdateEvent({list});
    }
}

const list = [...document.querySelectorAll('.j-map-yandex-components-view-all')];

list.forEach((element) => {
    new MapYandexComponentsViewAll(element);
})
