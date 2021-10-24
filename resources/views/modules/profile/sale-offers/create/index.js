import 'views/components/inputs/radio/content-group';
import 'views/components/inputs/radio/group';
import DG from '2gis-maps';
// import L from 'leaflet';
import 'leaflet.markercluster';
// import 'leaflet/dist/leaflet.css';
import 'leaflet.markercluster/dist/MarkerCluster.css';
import 'leaflet.markercluster/dist/MarkerCluster.Default.css';
import 'views/components/inputs/radio/group';
import './index.less';

// const map = L.map('leaflet-map', {
//     preferCanvas: true
// }).setView([56.486932, 84.944716], 36);
//
// L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
//     attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
// }).addTo(map);
//
// L.marker([56.486932, 84.944716]).addTo(map)
//     .bindPopup('A pretty CSS3 popup.<br> Easily customizable.')
//     .openPopup();

// const test = L.markerClusterGroup();
// console.log('test')
// console.log(test)
//
// var map2gis;

// DG.then(() => {
//     // map2gis = DG.map('2gis-map', {
//     //     center: [56.486932, 84.944716],
//     //     zoom: 13
//     // });
//     //
//     // DG.marker([56.486932, 84.944716]).addTo(map2gis).bindPopup('Вы кликнули по мне!');
//     // DG.marker([56.487032, 84.944816]).addTo(map2gis).bindPopup('Вы кликнули по мне!');
//     var map2gis = DG.map('2gis-map', {
//         'center': [56.486932, 84.944716],
//         'zoom': 13
//     });
//     // инициализация модуля
//     const clusterGroup = L.markerClusterGroup();
//     // const marker = L.marker(new L.LatLng(56.486932, 84.944716));
//     // clusterGroup.addLayer(marker);
//     // map2gis.addLayer(clusterGroup);
// });

const map2gis = DG.map('2gis-map', {
    'center': [56.486932, 84.944716],
    'zoom': 13
});
// инициализация модуля
const clusterGroup = DG.markerClusterGroup();
const marker = DG.marker(new DG.LatLng(56.486932, 84.944716));
marker.bindPopup('<a href="/test">test</a>');

const marker2 = DG.marker(new DG.LatLng(56.486932, 84.944716));
clusterGroup.addLayer(marker);
clusterGroup.addLayer(marker2);
map2gis.addLayer(clusterGroup);
