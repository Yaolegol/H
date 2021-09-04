import {addEventListener} from 'helpers/events';
import './index.less';

class InputsFileItem {
    constructor(element) {
        this.module = element;
        this.imageContainer = this.module.querySelector('.j-inputs-file-item__image-container');
        this.input = this.module.querySelector('.j-inputs-file-item__input');

        this.bind();
    }

    bind = () => {
        addEventListener(this.input, 'change', this.handleInputChange);
    }

    addImageToHTML = (src) => {
        const image = `
            <img
                alt=""
                class="inputs-file-item__image"
                src="${src}"
            >
        `;

        this.imageContainer.innerHTML = ('beforeend', image);
    }

    handleInputChange = (e) => {
        const file = e.target.files[0];

        if(file) {
            const src = URL.createObjectURL(file);
            this.addImageToHTML(src);
        }
    }
}

const list = [...document.querySelectorAll('.j-inputs-file-item')];

list.forEach((element) => {
    new InputsFileItem(element);
});
