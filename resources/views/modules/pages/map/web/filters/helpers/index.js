import {EVENTS_NAMES} from 'events/index';

const {
    COMMON: {
        MODALS: {
            COMMON: {
                OPEN,
            }
        }
    }
} = EVENTS_NAMES;

export const mapFiltersOpenModal = () => {
    document.dispatchEvent(new CustomEvent(OPEN, {
        detail: {
            name: 'categories'
        }
    }));
}
