import DG from '2gis-maps';
import 'leaflet.markercluster';
import 'leaflet.markercluster/dist/MarkerCluster.css';
import 'leaflet.markercluster/dist/MarkerCluster.Default.css';

export class Map2gisBase {
    constructor({center, markerDataList, onMapClick, useMarkerCluster, zoom}) {
        this.initMap({center, onMapClick, zoom});
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

    initMap = ({center, onMapClick, zoom}) => {
        this.map = DG.map('map-2gis', {
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

            markerDataList.forEach(({lat, lng, popupHtml}) => {
                const coords = new DG.LatLng(lat, lng);
                const marker = DG.marker(coords);

                if(popupHtml) {
                    marker.bindPopup(popupHtml);
                }

                if(useMarkerCluster) {
                    this.clusterGroup.addLayer(marker);
                } else {
                    this.map.addLayer(marker);
                }
            });

            if(useMarkerCluster) {
                this.map.addLayer(this.clusterGroup);
            }
        }
    }
}
