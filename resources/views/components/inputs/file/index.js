import {addEventListener} from 'helpers/events';
import './index.less';

class InputsFile {
    constructor(element) {
        this.module = element;
        this.imageContainer = this.module.querySelector('.j-inputs-file__image-container');
        this.input = this.module.querySelector('.j-inputs-file__input');

        this.bind();
    }

    bind = () => {
        addEventListener(this.input, 'change', this.handleInputChange);
    }

    addImageToHTML = (src) => {
        const image = `
            <img
                alt=""
                class="inputs-file__image"
                src="${src}"
            >
        `;

        this.imageContainer.insertAdjacentHTML('afterbegin', image);
    }

    handleInputChange = (e) => {
        const file = e.target.files[0];

        if(file) {
            const src = URL.createObjectURL(file);
            this.addImageToHTML(src);
        }
    }
}

const list = [...document.querySelectorAll('.j-inputs-file')];

list.forEach((element) => {
    new InputsFile(element);
});
