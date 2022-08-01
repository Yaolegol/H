import {addEventListener} from 'helpers/events';
import './index.less';

export class ButtonsFilter {
    constructor({container, onClick, onReset}) {
        this.init({container, onClick, onReset});
        this.bind();
    }

    bind = () => {
        addEventListener(this.module, 'click', this.handleClick);
        addEventListener(this.buttonReset, 'click', this.handleResetButtonClick);
    }

    checkResetButtonVisibility = () => {
        const title = this.titleContainer.textContent;

        if(title.trim() !== this.defaultTitle) {
            this.toggleButtonDefaultState(false);
        } else {
            this.toggleButtonDefaultState(true);
        }
    }

    handleClick = (e) => {
        const isResetButton = this.isResetButtonPressed(e);

        if(isResetButton || !this.onClick) {
            return;
        }

        this.onClick();
    }

    handleResetButtonClick = (e) => {
        e.stopPropagation();
        this.onReset();
        this.toggleButtonDefaultState(true);
    }

    setFilter = (value) => {
        if(!value) {
            this.toggleButtonDefaultState(true);

            return;
        }

        this.setTitle(value);
        this.checkResetButtonVisibility();
    }

    init = ({container, onClick, onReset}) => {
        this.module = container.querySelector('.j-buttons-filter');
        this.onClick = onClick;
        this.onReset = onReset;
        this.defaultTitle = this.module.dataset.defaultTitle.trim();
        this.titleContainer = this.module.querySelector('.j-buttons-filter__title');
        this.buttonReset = this.module.querySelector('.j-buttons-filter__button-reset');

        this.checkResetButtonVisibility();
    }

    isResetButtonPressed = (e) => {
        return e.target.classList.contains('j-buttons-filter__button-reset') || e.target.closest('.j-buttons-filter__button-reset');
    }

    setTitle = (title) => {
        this.titleContainer.textContent = title;
    }

    toggleButtonDefaultState = (isDefault = false) => {
        if(isDefault) {
            this.module.classList.add('j-style-default-state');
            this.setTitle(this.defaultTitle);
        } else {
            this.module.classList.remove('j-style-default-state');
        }
    }
}
