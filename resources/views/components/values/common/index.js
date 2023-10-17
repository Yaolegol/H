import {addEventListener} from "helpers/events";
import {module} from "helpers/module";
import {ButtonsFilter} from "views/components/buttons/filter";
import './index.less';

class ValuesCommon {
    constructor(element) {
        this.module = element;
        this.templateButton = this.module.querySelector('.j-components-values-common__template-button');
        this.valuesContainer = this.module.querySelector('.j-components-values-common__values-container');
        this.id = this.module.dataset.id;

        this.bind();
    }

    bind = () => {
        addEventListener(document, 'j-event-components-values-common__values-set', this.handleValuesSet);
        addEventListener(document, 'j-event-components-values-common__values-remove', this.handleValuesRemove);
    }

    createTemplateButton = (data) => {
        const {title, value} = data;

        const template = this.templateButton.cloneNode(true);
        this.setButtonTemplateStyles(template);
        this.setButtonTemplateValue(template, value);
        this.setButtonTemplateTitle(template, title);
        this.valuesContainer.appendChild(template);
        this.buttonsFilterInstance = new ButtonsFilter({
            container: template,
            onReset: this.handleResetClick(template, data),
        });
    }

    getButtonByValue = (value) => {
        return this.module.querySelector(`[data-value="${value}"]`);
    }

    handleResetClick = (template, data) => {
        return () => {
            template.remove();

            this.sendMessage(data);
        }
    }

    handleValuesRemove = (e) => {

    }

    handleValuesSet = (e) => {
        const {detail} = e;
        const {id} = detail;

        if(id !== this.id) {
            return;
        }

        const {data} = detail;

        if(data.isChecked) {
            const buttonTemplate = this.createTemplateButton(data);

            return;
        }

        this.removeButton(data);
    }

    removeButton = (data) => {
        const button = this.getButtonByValue(data.value);

        if(!button) {
            return;
        }
    }

    sendMessage = (data) => {
        document.dispatchEvent(new CustomEvent('j-event-components-values-common__click-reset', {
            detail: {
                data,
            }
        }));
    }

    setButtonTemplateStyles = (template) => {
        const filterContainer = template.querySelector('.j-buttons-filter');
        filterContainer.classList.remove('hidden');
    }

    setButtonTemplateTitle = (template, title) => {
        const titleContainer = template.querySelector('.j-buttons-filter__title');
        titleContainer.innerHTML = title;
    }

    setButtonTemplateValue = (template, value) => {
        template.setAttribute('data-value', value);
    }
}

module.initModule('j-components-values-common', ValuesCommon);
