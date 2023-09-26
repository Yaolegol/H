import {addEventListener} from "helpers/events";
import {module} from "helpers/module";

class ValuesCommon {
    constructor(element) {
        this.module = element;

        this.bind();
    }

    bind = () => {
        addEventListener(this.module, 'click', this.handleClick);
    }

    handleClick = (e) => {

    }
}

module.initModule('j-components-values-common', ValuesCommon);
