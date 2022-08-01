import {addEventListener} from "helpers/events";
import {module} from "helpers/module";
import {ButtonsFilter} from "views/components/buttons/filter";
import './index.less';

class ProductFilterButton {
    constructor(element) {
        this.module = element;

        this.initButtonsFilter();
        this.bind();
    }

    bind = () => {
        addEventListener(document, 'j-event-modules-pages-map-web-common-components-filters-product-controller__set-filter', this.handleSetFilter)
    }

    handleResetClick = () => {
        document.dispatchEvent(new CustomEvent('j-event--modules-pages-map-web-common-components-filters-product-filter-button__reset'));
    }

    handleSetFilter = (e) => {
        const {value} = e.detail;

        this.buttonsFilterInstance.setFilter(value);
    }

    initButtonsFilter = () => {
        this.buttonsFilterInstance = new ButtonsFilter({
            container: this.module,
            onReset: this.handleResetClick,
        });
    }
}

module.initModule('j-modules-common-filters-product-filter-button', ProductFilterButton);
