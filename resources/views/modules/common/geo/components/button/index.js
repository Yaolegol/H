import {addEventListener} from "helpers/events";
import './index.less';

class GeoButton {
    constructor(item) {
        this.module = item;

        this.bind();
    }

    bind = () => {
        addEventListener(this.module, 'click', this.handleClick);
    }

    handleClick = (e) => {
        navigator.geolocation.getCurrentPosition(this.handleSuccess, this.handleError, {
            enableHighAccuracy: true,
            timeout: 10000,
        });
    }

    handleError = (e) => {
        console.error(e)
    }

    handleSuccess = (position) => {
        document.dispatchEvent(new CustomEvent('j-event-modules-common-geo-components-button__update-geo', {
            detail: {
                position,
            }
        }));
    }
}

const list = document.querySelectorAll('.j-modules-common-geo-components-button');

list.forEach((item) => {
    new GeoButton(item);
})
