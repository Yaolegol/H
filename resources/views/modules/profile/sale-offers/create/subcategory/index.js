import {EVENTS_NAMES} from 'events/index';
import {addEventListener} from 'helpers/events';
import 'views/components/inputs/radio/item';
import './index.less';

const {
    INPUTS: {
        RADIO: {
            GROUP: {
                CHANGE,
                RESET,
            }
        }
    }
} = EVENTS_NAMES;

class ProfileSaleOffersCreateSubcategory {
    constructor(element) {
        this.module = element;
        this.subcategoryContainerList = [...this.module.querySelectorAll('.j-profile--sale-offers--create--subcategory__subcategory-container')];
        this.subcategoryContainerMap = this.getSubcategoryContainerMap();
        this.activeSubcategoryContainer = null;

        addEventListener(document, CHANGE, this.handleChange);
    }

    getSubcategoryContainerMap = () => {
        return this.subcategoryContainerList.reduce((acc, subcategoryContainer) => {
            const id = subcategoryContainer.dataset.subcategoryId;

            return {
                ...acc,
                [id]: subcategoryContainer
            }
        }, {});
    }

    handleChange = (e) => {
        const {detail} = e;
        const {groupName, value} = detail;

        if(groupName === 'category') {
            this.module.classList.remove('profile--sale-offers--create--subcategory_hidden');

            if(this.activeSubcategoryContainer) {
                this.activeSubcategoryContainer.classList.remove('profile--sale-offers--create--subcategory__subcategory-container_active');

                document.dispatchEvent(new CustomEvent(RESET, {
                    detail: {
                        groupName: 'subcategory',
                    }
                }));
            }

            this.activeSubcategoryContainer = this.subcategoryContainerMap[value];
            this.activeSubcategoryContainer.classList.add('profile--sale-offers--create--subcategory__subcategory-container_active');
        }
    }
}

const list = [...document.querySelectorAll('.j-profile--sale-offers--create--subcategory')];

list.forEach((element) => {
    new ProfileSaleOffersCreateSubcategory(element);
});
