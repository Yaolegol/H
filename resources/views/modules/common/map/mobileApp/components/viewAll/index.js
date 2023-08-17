import {addEventListener} from "helpers/events";
import {debounce} from "helpers/debounce";
import {getOfferBalloon} from "views/modules/common/map/yandex/components/balloon/offer/viewAll";
import './index.less';

class MapMobileAppComponentsViewAll {
    constructor(element) {
        this.module = element;
        this.mapContainer = this.module.querySelector('.j-map-mobile-app-components-view-all__map-container');

        this.init();
        this.bind();
    }

    addMarkersToMap = () => {
        this.mapCluster = new ymaps.Clusterer();
        const placemarks = [];

        this.offerData.forEach(({markersList, offer}) => {
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
                        balloonContentLayout: this.getBalloonContentLayoutClass(offer, id.toString()),
                    },
                );

                markerInstance.events.add(['click'], this.handlePlacemarkClick);
                placemarks.push(markerInstance);
            });
        });

        this.mapCluster.add(placemarks);
        this.mapInstance.geoObjects.add(this.mapCluster);
    }

    addMobileAppFunctions = () => {
        this.addMobileAppFunction_zoomToUser();
        this.addMobileAppFunction_fetchMarkersData();
        this.addMobileAppFunction_showPlacemark();
    }

    addMobileAppFunction_fetchMarkersData = () => {
        window.fetchMarkersData = (catalogLevelOneId, catalogLevelTwoId) => {
            this.fetchMarkersData(catalogLevelOneId, catalogLevelTwoId);
        }
    }

    addMobileAppFunction_showPlacemark = () => {
        window.showPlacemark = (placemarkId) => {
            this.handleShowPlacemark(placemarkId);
        }
    }

    addMobileAppFunction_zoomToUser = () => {
        window.zoomToUser = (latitude, longitude) => {
            this.zoomToUser(latitude, longitude);
        }
    }

    bind = () => {
        addEventListener(document, 'j-map-mobile-app-components-view-all__get-visible-markers-data', this.handleGetVisibleMarkerData)
    }

    bindMapEvents = () => {
        this.mapInstance.events.add(['boundschange'], debounce(this.handleMapBoundsChange, 500));
    }

    fetchMarkersData = async (catalogLevelOneId, catalogLevelTwoId) => {
        const {data, errors} = await this.fetchData(catalogLevelOneId, catalogLevelTwoId);

        if(!errors) {
            this.offerData = data;

            this.mapInstance.geoObjects.remove(this.mapCluster);
            this.addMarkersToMap();

            this.sendPlacemarksDataList();
        }
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

        document.dispatchEvent(new CustomEvent('j-map-mobile-app-components-view-all__get-visible-markers-data-complete', {
            detail: {
                list,
            }
        }));
    }

    handleMapBoundsChange = () => {
        this.sendPlacemarksDataList();
    }

    handlePlacemarkClick = (e) => {
        const {originalEvent} = e;

        this.mapInstance.setCenter(originalEvent.target.geometry.getCoordinates(), 17, {
            duration: 1000,
        });
    }

    handleShowPlacemark = (placemarkId) => {
        const geoQueryResult = ymaps.geoQuery(this.mapCluster.getGeoObjects());
        const geoQueryResultPlacemarks = geoQueryResult.search(`properties.id = "${placemarkId}"`);

        this.mapInstance.setCenter(geoQueryResultPlacemarks.get(0).geometry.getCoordinates(), 17, {
            duration: 1000,
        });
    }

    fetchData = async (catalogLevelOneId, catalogLevelTwoId) => {
        try {
            const bodyData = {
                filter: {
                    catalog: {
                        levelOneId: catalogLevelOneId ?? null,
                        levelTwoId: catalogLevelTwoId ?? null,
                    },
                }
            };

            const body = JSON.stringify(bodyData);

            const result = await fetch('/api/map', {
                body,
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                },
                method: 'POST',
            });

            return result.json();
        } catch(err) {
            console.error(err);
        }
    }

    getBalloonContentLayoutClass = (offerData, markerId) => {
        return ymaps.templateLayoutFactory.createClass(getOfferBalloon(offerData, markerId));
    };

    handleYMapsReady = () => {
        this.initMap();
        this.addMarkersToMap();
        this.bindMapEvents();
        this.sendPlacemarksDataList();

        this.addMobileAppFunctions();
    }

    init = async () => {
        const {data, errors} = await this.fetchData();

        if(!errors) {
            this.offerData = data;

            window.ymaps.ready(this.handleYMapsReady);
        }
    }

    initMap = () => {
        let zoom = 2;
        const screenWidth = window.innerWidth;

        if(screenWidth >= 768 && screenWidth < 1024) {
            zoom = 3.5;
        } else if(screenWidth >= 600 && screenWidth < 768) {
            zoom = 3;
        } else if(screenWidth >= 500 && screenWidth < 600) {
            zoom = 2.5;
        } else if(screenWidth >= 375 && screenWidth < 500) {
            zoom = 2;
        } else if(screenWidth < 375) {
            zoom = 1;
        }

        this.mapInstance = new ymaps.Map(this.mapContainer, {
            center: [33, 84],
            controls: ['zoomControl'],
            zoom,
        });
    }

    sendPlacemarksDataList = () => {
        const list = this.getPlacemarksDataList();

        if(window.MOBILE_APP__EVENTS) {
            window.MOBILE_APP__EVENTS.postMessage(JSON.stringify({
                data: list,
            }));
        }
    }

    zoomToUser = (latitude, longitude) => {
        this.mapInstance.setCenter([latitude, longitude], 11, {
            duration: 1000,
        });
    }
}

const list = [...document.querySelectorAll('.j-map-mobile-app-components-view-all')];

list.forEach((element) => {
    new MapMobileAppComponentsViewAll(element);
})
