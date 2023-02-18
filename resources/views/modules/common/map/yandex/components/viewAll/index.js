import {getCookieData} from "helpers/cookie";
import {addEventListener} from "helpers/events";
import {getQueryData} from "helpers/query";
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
            markersList.forEach(({markerCoords}) => {
                const {lat, lng} = markerCoords;

                const markerInstance = new ymaps.Placemark(
                    [lat, lng],
                    {
                        data: {
                            offer,
                        },
                        id: offer.product.id,
                    },
                    {
                        balloonContentLayout: this.getBalloonContentLayoutClass(),
                    },
                );

                placemarks.push(markerInstance);
            });
        });

        this.mapCluster.add(placemarks);
        this.mapInstance.geoObjects.add(this.mapCluster);
    }

    bind = () => {
        addEventListener(document, 'j-event--map-filter-update', this.handleUpdateMapFilter)
    }

    bindMapEvents = () => {
        addEventListener(document, 'j-event-map__show-placemark', this.handleShowPlacemark);

        this.mapInstance.events.add(['boundschange','datachange','objecttypeschange'], () => {
            const geoQueryResultInstance = ymaps.geoQuery(this.mapCluster.getGeoObjects()).searchInside(this.mapInstance);

            const list = [];

            geoQueryResultInstance.each((placemark) => {
                list.push({
                    placemark: {
                        id: placemark.properties.get('id'),
                    },
                    placemarkData: placemark.properties.get('data'),
                });
            });

            document.dispatchEvent(new CustomEvent('j-event-map-yandex-components-view-all__update-visible-markers-data', {
                detail: {
                    list,
                }
            }));
        });
    }

    handleShowPlacemark = (e) => {
        const geoQueryResult = ymaps.geoQuery(this.mapCluster.getGeoObjects());
        const geoQueryResultPlacemarks = geoQueryResult.search(`properties.id = ${e.detail.placemarkId}`);

        this.mapInstance.setCenter(geoQueryResultPlacemarks.get(0).geometry.getCoordinates(), 17, {
            duration: 1000,
        });
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

    getBalloonContentLayoutClass = () => {
        return ymaps.templateLayoutFactory.createClass(
            '<div>test</div>'
            // '<div>{{ properties.data.title }}</div>' +
            // '<div>Адрес:</div>' +
            // '<div>{{ properties.data.address }}</div>' +
            // '<div>Телефон:</div>' +
            // '<div>{{ properties.data.phone }}</div>' +
            // '<div>Цена:</div>' +
            // '<div>{{ properties.data.price }}</div>' +
            // '<div style="margin-top: 15px"><a href="/offers/{{properties.data.offerId}}">Подробнее</a></div>'
        );
    };

    handleUpdateMapFilter = async (e) => {
        const {data, errors} = await this.fetchData();

        if(!errors) {
            this.offerData = data;

            this.mapInstance.geoObjects.remove(this.mapCluster);
            this.addMarkersToMap();
        }
    }

    init = async () => {
        const {data, errors} = await this.fetchData();

        if(!errors) {
            this.offerData = data;

            window.ymaps.ready(() => {
                this.initMap();
            });
        }
    }

    initMap = () => {
        this.mapInstance = new ymaps.Map(this.mapContainer, {
            center: [62.395570, 104.432320],
            controls: ['zoomControl'],
            zoom: 2,
        });

        this.mapInstance.options.set('dragCursor', 'arrow');

        this.addMarkersToMap();
        this.bindMapEvents();
    }
}

const list = [...document.querySelectorAll('.j-map-yandex-components-view-all')];

list.forEach((element) => {
    new MapYandexComponentsViewAll(element);
})
