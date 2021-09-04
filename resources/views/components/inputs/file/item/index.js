import {addEventListener} from 'helpers/events';
import './index.less';

class InputsFileItem {
    constructor(element) {
        this.module = element;
        this.imageContainer = this.module.querySelector('.j-inputs-file-item__image-container');
        this.input = this.module.querySelector('.j-inputs-file-item__input');
        this.contentSection = this.module.querySelector('.j-inputs-file-item__content-section');
        this.inputSection = this.module.querySelector('.j-inputs-file-item__input-section');
        this.changeFileButton = this.module.querySelector('.j-inputs-file-item__change-file-button');
        this.removeFileButton = this.module.querySelector('.j-inputs-file-item__remove-file-button');
        this.withPreviewFile = this.module.hasAttribute('data-with-preview-file');
        this.groupName = this.module.dataset.groupName;

        this.bind();
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

        if(file) {
            const src = URL.createObjectURL(file);

            if(this.groupName) {
                this.notify(src);
            }

            if(this.withPreviewFile) {
                this.showFilePreview(src);
            }

            this.showContent();
        } else {
            if(e.target.files.length === 0) {
                this.hideContent();
            }
        }
    }

    handleRemoveFileButtonClick = (e) => {
        this.input.value = '';
        this.hideContent();
    }

    hideContent = () => {
        this.module.classList.remove('with-file');
        this.contentSection.classList.add('hidden');
        this.inputSection.classList.remove('hidden');
    }

    notify = (src) => {
        document.dispatchEvent(new CustomEvent('j-inputs-file-item__add-file', {
            detail: {
                fileSrc: src,
                groupName: this.groupName,
            }
        }));
    }

    showContent = () => {
        this.module.classList.add('with-file');
        this.contentSection.classList.remove('hidden');
        this.inputSection.classList.add('hidden');
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
