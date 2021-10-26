import {addEventListener} from "helpers/events";
import './index.less';


class CheckboxesMap {
    constructor(element) {
        this.module = element;
        this.markerLat = this.module.dataset.markerLat;
        this.markerLng = this.module.dataset.markerLng;

        this.bind();
    }

    bind = () => {
        if(this.markerLat && this.markerLng) {
            addEventListener(this.module, 'change', this.handleChange);
        }
    }

    handleChange = (e) => {
        const {target} = e;
        const isInput = target.classList.contains('j-checkboxes-map__input');

        if(isInput) {
            this.sendMessage({
                isChecked: target.checked,
                value: target.value
            });
        }
    }

    sendMessage = ({isChecked, value}) => {
        document.dispatchEvent(new CustomEvent('j-event__need-update-map-marker', {
            detail: {
                coords: {
                  lat: this.markerLat,
                  lng: this.markerLng,
                },
                isChecked,
                value
            }
        }));
    }
}

const list = [...document.querySelectorAll('.j-checkboxes-map')];

list.forEach((element) => {
    new CheckboxesMap(element);
});
