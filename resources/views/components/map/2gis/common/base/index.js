// import DG from '2gis-maps';
import 'leaflet.markercluster';
import 'leaflet.markercluster/dist/MarkerCluster.css';
import 'leaflet.markercluster/dist/MarkerCluster.Default.css';
import './index.less';

export class Map2gisCommonBase {
    constructor({center, mapContainer, markerDataList, onMapClick, useMarkerCluster, zoom}) {
        this.initMap({center, mapContainer, onMapClick, zoom});
        this.initMarkers({markerDataList, useMarkerCluster});
    }

    addMarker = ({lat, lng, popupHtml}) => {
        const coords = new DG.LatLng(lat, lng);
        const marker = DG.marker(coords);

        if(popupHtml) {
            marker.bindPopup(popupHtml);
        }

        this.map.addLayer(marker);

        return marker;
    }

    clearClusterGroup = () => {
        if(this.clusterGroup) {
            this.map.removeLayer(this.clusterGroup);
        }
    }

    initMap = ({center, mapContainer, onMapClick, zoom}) => {
        this.map = DG.map(mapContainer, {
            center,
            zoom
        });

        if(onMapClick) {
            this.map.on('click', onMapClick);
        }
    }

    initMarkers = ({markerDataList, useMarkerCluster}) => {
        if(markerDataList && markerDataList.length) {
            if(useMarkerCluster) {
                this.clusterGroup = DG.markerClusterGroup();
            }

            markerDataList.forEach((markerDataItem) => {
                markerDataItem.markersList.forEach((makerData) => {
                    const {data, markerCoords} = makerData;
                    const {lat, lng} = markerCoords;
                    const {address, phone} = data;

                    const coords = new DG.LatLng(lat, lng);
                    const marker = DG.marker(coords);

                    marker.bindPopup(`
                        <div class="components-map-2gis-common-base__marker-popup">
                            <div>Адресс</div>
                            <div>${address}</div>
                            <div>Телефон</div>
                            <div>${phone}</div>
                        </div>
                    `);

                    if(useMarkerCluster) {
                        this.clusterGroup.addLayer(marker);
                    } else {
                        this.map.addLayer(marker);
                    }
                });
            });

            if(useMarkerCluster) {
                this.map.addLayer(this.clusterGroup);
            }
        }
    }
}
