import {addEventListener} from "helpers/events";
import {module} from "helpers/module";
import {setUrlQuery} from "helpers/query";

class MapProductFilterController {
    constructor(item) {
        this.module = item;

        this.bind();
    }

    bind = () => {
        addEventListener(document, 'j-event--modules-pages-map-web-common-components-filters-product-filter-button__reset', this.handleReset);
        addEventListener(this.module, 'click', this.handleModuleClick);
    }

    handleModuleClick = (e) => {
        const target = e.target;
        const isFilterButton = target.classList.contains('j-modules-common-filters-product-modal-components-buttons-content');

        if(!isFilterButton) {
            return;
        }

        const id = target.dataset.id;
        const query = [
            {
                key: 'catalogLevelTwoId',
                value: id,
            }
        ];

        setUrlQuery(query);
        window.location.reload();
    }

    handleReset = (e) => {
        this.resetUrlQuery();
        window.location.reload();
    }

    resetUrlQuery = () => {
        const query = [
            {
                key: 'catalogLevelTwoId',
                value: null,
            }
        ];

        setUrlQuery(query);
    }
}

module.initModule('j-modules-pages-map-web-common-components-filters-product-controller', MapProductFilterController);
