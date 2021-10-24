import DG from '2gis-maps';
import 'leaflet.markercluster';
import 'leaflet.markercluster/dist/MarkerCluster.css';
import 'leaflet.markercluster/dist/MarkerCluster.Default.css';
import 'views/components/inputs/radio/content-group';
import 'views/components/inputs/radio/group';
import 'views/components/inputs/radio/group';
import './index.less';

const map2gis = DG.map('map-2gis', {
    'center': [56.486932, 84.944716],
    'zoom': 14
});
const clusterGroup = DG.markerClusterGroup();
const marker = DG.marker(new DG.LatLng(56.486932, 84.944716));
marker.bindPopup('<a href="/test">test</a>');

const marker2 = DG.marker(new DG.LatLng(56.486932, 84.944716));
clusterGroup.addLayer(marker);
clusterGroup.addLayer(marker2);
map2gis.addLayer(clusterGroup);
