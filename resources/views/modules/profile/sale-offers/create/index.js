import 'views/components/inputs/radio/content-group';
import 'views/components/inputs/radio/group';
import L from 'leaflet';
import 'leaflet/dist/leaflet.css';
import 'views/components/inputs/radio/group';
import './index.less';

const map = L.map('leaflet-map').setView([51.505, -0.09], 13);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);
