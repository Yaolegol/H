import {EVENTS_NAMES} from 'events/index';
import {addEventListener} from "helpers/events";
import {getUrlWithNewQueryData, setUrlQuery} from "helpers/query";
import "views/modules/pages/map/web/common/components/filters/modal/modalContent/navigationContentButton";
import 'views/modules/pages/map/web/common/components/filters/modal/modalContent/navigationItem';
import './index.less';

const {
    COMMON: {
        MODALS: {
            COMMON: {
                CLOSE,
            }
        }
    }
} = EVENTS_NAMES;

class MapFiltersModalContent {
    constructor(item) {
        this.module = item;

        this.bind();
    }

    bind = () => {
        addEventListener(document, 'j-event--map-web-filters-open-modal-button__reset', this.handleReset);
        addEventListener(this.module, 'click', this.handleModuleClick);
    }

    closeModal = () => {
        document.dispatchEvent(new CustomEvent(CLOSE, {
            detail: {
                name: 'categories'
            }
        }));
    }

    handleModuleClick = (e) => {
        const target = e.target;
        const isNavigationContentButton = target.classList.contains('j-map-web-filters-components-navigation-content-button');

        if(isNavigationContentButton) {
            const id = target.dataset.id;
            const query = [
                {
                    key: 'catalogLevelTwoId',
                    value: id,
                }
            ];

            this.closeModal();
            setUrlQuery(query);
            this.sendMapFilterUpdateMessage(target);
        }
    }

    handleReset = (e) => {
        this.resetUrlQuery();
        this.sendMapFilterUpdateMessage();
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

    sendMapFilterUpdateMessage = (element) => {
        document.dispatchEvent(new CustomEvent('j-event--map-filter-update', {
            detail: {
                title: element?.innerHTML,
            }
        }));
    }
}

const list = [...document.querySelectorAll('.j-map-web-filters-components-modal-modal-content')];

list.forEach((item) => {
    new MapFiltersModalContent(item);
});
