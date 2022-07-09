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

export const locationOpenModal = (data = {}) => {
    document.dispatchEvent(new CustomEvent(OPEN, {
        detail: {...data}
    }));
}
