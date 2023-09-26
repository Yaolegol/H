import {addEventListener} from "helpers/events";
import {module} from "helpers/module";
import {ButtonsFilter} from "views/components/buttons/filter";

class ValuesCommon {
    constructor(element) {
        this.module = element;
        this.templateButton = this.module.querySelector('.j-components-values-common__template-button');
        this.id = this.module.dataset.id;

        console.log('INIT ValuesCommon')

        this.bind();
    }

    bind = () => {
        addEventListener(document, 'j-event-components-values-common__values-set', this.handleValuesSet);
        addEventListener(document, 'j-event-components-values-common__values-remove', this.handleValuesRemove);
    }

    createTemplateButton = (detail) => {
        const {data, id, title} = detail;

        const template = this.templateButton.cloneNode(true);
        this.setButtonTemplateStyles(template);
        this.setButtonTemplateTitle(template, title);
        this.module.appendChild(template);
        this.buttonsFilterInstance = new ButtonsFilter({
            container: template,
            onReset: this.handleResetClick(template, data, id),
        });
    }

    handleResetClick = (template, data, id) => {
        return () => {
            template.remove();
            this.sendMessage(data, id);
        }
    }

    handleValuesRemove = (e) => {

    }

    handleValuesSet = (e) => {
        const {detail} = e;
        const {id} = detail;

        console.log('handleValuesSet')
        console.log('detail')
        console.log(detail)

        if(id !== this.id) {
            return;
        }

        const buttonTemplate = this.createTemplateButton(detail);
    }

    sendMessage = (data, id) => {
        document.dispatchEvent(new CustomEvent('j-event-components-values-common__click-reset', {
            detail: {
                data,
                id,
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
}

module.initModule('j-components-values-common', ValuesCommon);
