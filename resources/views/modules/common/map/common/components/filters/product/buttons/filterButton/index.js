import {module} from "helpers/module";
import {ButtonsFilter} from "views/components/buttons/filter";
import './index.less';

class ProductFilterButton {
    constructor(element) {
        this.module = element;

        this.initButtonsFilter();
    }

    handleResetClick = () => {
        document.dispatchEvent(new CustomEvent('j-event--modules-pages-map-web-common-components-filters-product-filter-button__reset'));
    }

    initButtonsFilter = () => {
        this.buttonsFilterInstance = new ButtonsFilter({
            container: this.module,
            onReset: this.handleResetClick,
        });
    }
}

module.initModule('j-modules-common-filters-product-filter-button', ProductFilterButton);
