import {addEventListener} from 'helpers/events';
import './index.less';

class InputsFileItem {
    constructor(element) {
        this.module = element;
        this.imageContainer = this.module.querySelector('.j-inputs-file-item__image-container');
        this.input = this.module.querySelector('.j-inputs-file-item__input');
        this.inputName = this.input.name;
        this.changeFileButton = this.module.querySelector('.j-inputs-file-item__change-file-button');
        this.removeFileButton = this.module.querySelector('.j-inputs-file-item__remove-file-button');
        this.withPreviewFile = this.module.hasAttribute('data-with-preview-file');

        this.bind();
    }

    addFilePreview = (src) => {
        const image = `
            <img
                alt=""
                class="inputs-file-item__image"
                src="${src}"
            >
        `;

        this.imageContainer.innerHTML = image;
    }

    addRemoveInput = () => {
        const input = `
            <input name="remove_${this.inputName}" />
        `;

        this.module.insertAdjacentHTML('afterbegin', input);
    }

    bind = () => {
        addEventListener(this.input, 'change', this.handleInputChange);
        addEventListener(this.changeFileButton, 'click', this.handleChangeFileButtonClick);
        addEventListener(this.removeFileButton, 'click', this.handleRemoveFileButtonClick);
    }

    handleChangeFileButtonClick = (e) => {
        this.input.click();
    }

    handleInputChange = (e) => {
        const file = e.target.files[0];

        if (this.withPreviewFile) {
            if (file) {
                const src = URL.createObjectURL(file);
                this.addFilePreview(src);
                this.showContent();
            } else {
                if (e.target.files.length === 0) {
                    this.hideContent();
                }
            }
        }
    }

    handleRemoveFileButtonClick = (e) => {
        this.input.value = '';
        this.hideContent();
        this.addRemoveInput();
    }

    hideContent = () => {
        this.module.classList.remove('inputs-file-item_with-image');
    }

    showContent = () => {
        this.module.classList.add('inputs-file-item_with-image');
    }
}

const list = [...document.querySelectorAll('.j-inputs-file-item')];

list.forEach((element) => {
    new InputsFileItem(element);
});
