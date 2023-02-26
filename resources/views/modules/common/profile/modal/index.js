import {addEventListener} from "helpers/events";
import {module} from "helpers/module";
import './index.less';

class OffersModal {
    constructor(element) {
        this.module = element;
        this.link = this.module.querySelector('.j-modules-common-profile-modal__link');
        this.href = this.module.dataset.href;

        this.init();
    }

    init = () => {
        this.link.href = this.href;
    }
}

module.initModule('j-modules-common-profile-modal', OffersModal);
