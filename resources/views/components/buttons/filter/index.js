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

    checkResetButtonVisibility = (text) => {
        if(text.trim() !== this.defaultTitle) {
            this.toggleButtonDefaultState(false);
        } else {
            this.toggleButtonDefaultState(true);
        }
    }

    handleClick = (e) => {
        const isResetButton = this.isResetButtonPressed(e);

        if(isResetButton) {
            return;
        }

        this.onClick();
    }

    handleResetButtonClick = () => {
        this.onReset();
        this.toggleButtonDefaultState(true);
    }

    init = ({container, onClick, onReset}) => {
        this.module = container.querySelector('.j-buttons-filter');
        this.onClick = onClick;
        this.onReset = onReset;
        this.defaultTitle = this.module.dataset.defaultTitle.trim();
        this.title = this.module.querySelector('.j-buttons-filter__title');
        this.buttonReset = this.module.querySelector('.j-buttons-filter__button-reset');

        this.checkResetButtonVisibility(this.title.textContent);
    }

    isResetButtonPressed = (e) => {
        return e.target.classList.contains('j-buttons-filter__button-reset') || e.target.closest('.j-buttons-filter__button-reset');
    }

    setButtonText = (text) => {
        this.title.textContent = text || this.defaultTitle;

        this.checkResetButtonVisibility(text);
    }

    toggleButtonDefaultState = (isDefault = false) => {
        if(isDefault) {
            this.module.classList.add('j-style-default-state');
        } else {
            this.module.classList.remove('j-style-default-state');
        }
    }
}
