import {addEventListener} from "helpers/events";
import './index.less';

class SearchSync {
    constructor(element) {
        this.module = element;
        this.name = this.module.dataset.name;
        this.searchInput = this.module.querySelector('.j-components-test__input');
        this.categoriesBlockList = [...this.module.querySelectorAll('.j-components-test__categories-searchable-block')];
        this.valuesBlockList = [...this.module.querySelectorAll('.j-components-test__values-searchable-block')];

        this.init();
        this.bind();
    }

    bind = () => {
        addEventListener(this.searchInput, 'input', this.handleInput);
    }

    handleInput = (e) => {
        document.dispatchEvent(new CustomEvent('j-event-components-test__input', {
            detail: {
                value: e.target.value,
            }
        }));
    }

    init = () => {
        console.log('---------- init')

        this.valuesMap = this.valuesBlockList.reduce((acc, element) => {
            const id = element.dataset.itemId;
            const elementList = [...element.querySelectorAll('.j-components-test__values-searchable-container')];

            const dataList = elementList.map((container) => {
                const valueElement = container.querySelector('.j-components-test__values-searchable-element');

                return {
                    container,
                    title: valueElement.innerText.replace(/\s/g,''),
                };
            });

            return {
                ...acc,
                [id]: dataList,
            }
        }, {});

        this.catalogList = this.categoriesBlockList.reduce((acc, container) => {
            const id = container.dataset.itemId;
            const catalogValueContainer = container.querySelector('.j-components-test__categories-searchable-element');
            const catalogTitle = catalogValueContainer.innerText.replace(/\s/g,'');

            return [
                ...acc,
                {
                    catalogFirstLevel: {
                        container,
                        title: catalogTitle,
                    },
                    catalogSecondLevel: [...this.valuesMap[id]],
                }
            ]
        }, []);

        console.log('this.valuesMap')
        console.log(this.valuesMap)
        console.log('this.catalogList')
        console.log(this.catalogList)
    }
}

const list = [...document.querySelectorAll('.j-components-test')];

list.forEach((element) => {
    new SearchSync(element);
});
