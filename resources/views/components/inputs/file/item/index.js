import {addEventListener} from 'helpers/events';
import './index.less';

class InputsFileItem {
    constructor(element) {
        this.module = element;
        this.imageContainer = this.module.querySelector('.j-inputs-file-item__image-container');
        this.input = this.module.querySelector('.j-inputs-file-item__input');
        this.withPreviewFile = this.module.hasAttribute('data-with-preview-file');
        this.groupName = this.module.dataset.groupName;

        this.bind();
    }

    bind = () => {
        addEventListener(this.input, 'change', this.handleInputChange);
    }

    handleInputChange = (e) => {
        const file = e.target.files[0];

        if(file) {
            const src = URL.createObjectURL(file);

            if(this.groupName) {
                document.dispatchEvent(new CustomEvent('j-inputs-file-item__add-file', {
                    detail: {
                        fileSrc: src,
                        groupName: this.groupName,
                    }
                }));
            }

            if(this.withPreviewFile) {
                this.showFilePreview(src);
            }
        }
    }

    showFilePreview = (src) => {
        const image = `
            <img
                alt=""
                class="inputs-file-item__image"
                src="${src}"
            >
        `;

        this.imageContainer.innerHTML = image;
    }
}

const list = [...document.querySelectorAll('.j-inputs-file-item')];

list.forEach((element) => {
    new InputsFileItem(element);
});
