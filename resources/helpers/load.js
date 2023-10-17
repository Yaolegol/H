import {addEventListener} from 'helpers/events';

export const handleLoad = () => {
    document.addEventListener("DOMContentLoaded", function (event) {
        document.body.dispatchEvent(new CustomEvent('DOM-ready'));
    });
}

export const addOnLoadListener = (listener) => {
    const body = document.querySelector('body');
    addEventListener(body, 'DOMContentLoaded', listener);
}
