import DG from '2gis-maps';
import 'leaflet.markercluster';
import 'leaflet.markercluster/dist/MarkerCluster.css';
import 'leaflet.markercluster/dist/MarkerCluster.Default.css';

export class Map2gis {
    constructor({center, markerDataList, zoom}) {
        this.initMap({center, zoom});
        this.initMarkers(markerDataList);
    }

    initMap = ({center, zoom}) => {
        this.map = DG.map('map-2gis', {
            center,
            zoom
        });
    }

    initMarkers = (markerDataList) => {
        if(markerDataList && markerDataList.length) {
            const clusterGroup = DG.markerClusterGroup();

            markerDataList.forEach(({lat, lng, popupHtml}) => {
                const coords = new DG.LatLng(lat, lng);
                const marker = DG.marker(coords);

                if(popupHtml) {
                    marker.bindPopup(popupHtml);
                }

                clusterGroup.addLayer(marker);
            });

            this.map.addLayer(clusterGroup);
        }
    }
}
