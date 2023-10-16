import {addEventListener} from "helpers/events";
import {module} from "helpers/module";
import {getUrlWithNewQueryData, setUrlQuery} from "helpers/query";
import './index.less';

class SearchResultItemCatalog {
    constructor(element) {
        this.module = element;
        this.id = Number(this.module.dataset.id);
        this.level = Number(this.module.dataset.level);

        this.bind();
    }

    bind = () => {
        addEventListener(this.module, 'click', this.handleDocumentClick);
    }

    handleDocumentClick = (e) => {
        console.log('TEST')

        const query = [];

        if(this.level === 1) {
            query.push(
                {
                    key: 'catalogLevelOneId',
                    value: this.id,
                },
                {
                    key: 'catalogLevelTwoId',
                    value: null,
                }
            );
        }

        if(this.level === 2) {
            query.push(
                {
                    key: 'catalogLevelOneId',
                    value: null,
                },
                {
                    key: 'catalogLevelTwoId',
                    value: this.id,
                }
            );
        }

        if(window.location.pathname === '/') {
            setUrlQuery(query);
            window.location.reload();

            return;
        }

        window.location.href = getUrlWithNewQueryData({
            defaultUrl: window.location.origin,
            queryDataArray: query,
        });
    }
}

module.initModule('j-modules-common-header-search-templates-search-result-item-catalog', SearchResultItemCatalog);
