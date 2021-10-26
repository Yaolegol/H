import {addEventListener} from "helpers/events";
import './index.less';


class CheckboxesMap {
    constructor(element) {
        this.module = element;
        this.input = this.module.querySelector('.j-checkboxes-map__input');
        this.isChecked = this.input.hasAttribute('checked');
        this.markerLat = this.module.dataset.markerLat;
        this.markerLng = this.module.dataset.markerLng;
        this.withCoords = Boolean(this.markerLat) && Boolean(this.markerLng);

        this.sendInitialMessage();
        this.bind();
    }

    bind = () => {
        if(this.withCoords) {
            addEventListener(this.module, 'change', this.handleChange);
        }
    }

    handleChange = (e) => {
        const {target} = e;
        const isInput = target.classList.contains('j-checkboxes-map__input');

        if(isInput) {
            this.sendMessage();
        }
    }

    sendInitialMessage = () => {
        if(this.isChecked && this.withCoords) {
            this.sendMessage({
                isChecked: this.input.checked,
                value: this.input.value
            });
        }
    }

    sendMessage = () => {
        document.dispatchEvent(new CustomEvent('j-event__need-update-map-marker', {
            detail: {
                coords: {
                  lat: this.markerLat,
                  lng: this.markerLng,
                },
                isChecked: this.input.checked,
                value: this.input.value,
            }
        }));
    }
}

const list = [...document.querySelectorAll('.j-checkboxes-map')];

list.forEach((element) => {
    new CheckboxesMap(element);
});
