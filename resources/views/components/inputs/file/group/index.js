import {addEventListener} from 'helpers/events';
import 'views/components/inputs/file/item';
import './index.less';

// const fileItemTemplate = `
//     <div class="inputs-file-item j-inputs-file-item">
//         <div class="inputs-file-item__image-section j-inputs-file-item__image-container"></div>
//         <div class="inputs-file-item__input-section">
//             <label class="inputs-file-item__label" for="file-input-${name}">${title}</label>
//             <input
//                 class="inputs-file-item__input j-inputs-file-item__input"
//                 id="file-input-${name}"
//                 name="${name}"
//                 type="file"
//             >
//         </div>
//     </div>
// `

class InputsFileGroup {
    constructor(element) {
        this.module = element;
        this.groupName = this.module.dataset.groupName;
        this.imageListContainer = this.module.querySelector('.j-inputs-file-group__image-list-container');

        this.bind();
    }

    bind = () => {
        addEventListener(document, 'j-inputs-file-item__add-file', this.handleInputItemChange);
    }

    handleInputItemChange = (e) => {
        const {detail} = e;
        const {fileSrc, groupName} = detail;

        if(groupName === this.groupName) {
            this.showFilePreview(fileSrc);
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

        this.imageListContainer.innerHTML = image;
    }
}

const list = [...document.querySelectorAll('.j-inputs-file-group')];

list.forEach((element) => {
    new InputsFileGroup(element);
});
