import {addEventListener} from 'helpers/events';

const jPrefix = 'j-';
const jStatusPrefix = jPrefix + 'status-';

class Module {
    constructor() {
        this.moduleData = {};

        this.bind();
    }

    bind = () => {
        addEventListener(document, 'j-event-module__update', this.handleUpdate);
    }

    createModule = (cssClass, JsClass) => {
        const namesArray = cssClass.split(jPrefix);

        if(namesArray.length === 1) {
            console.error('No j- prefix exists');

            return;
        }

        const initCssClass = this.getInitName(namesArray[1]);
        const selector = `.${cssClass}:not(.${initCssClass})`

        const modulesList = document.querySelectorAll(selector);

        modulesList.forEach((element) => {
            element.classList.add(initCssClass);

            new JsClass(element);
        });

        this.notifyInit();
    }

    getInitName = (name) => {
        return jStatusPrefix + name;
    }

    handleUpdate = () => {
        Object.entries(this.moduleData).forEach(([cssClass, {JsClass}]) => {
            this.createModule(cssClass, JsClass);
        });
    }

    initModule = (cssClass, JsClass) => {
        this.moduleData = {
            ...this.moduleData,
            [cssClass]: {
                JsClass,
            }
        }

        this.createModule(cssClass, JsClass);
    }

    notifyInit = () => {
        document.dispatchEvent(new CustomEvent('j-event-module__init'));
    }

    updateModules = () => {
        document.dispatchEvent(new CustomEvent('j-event-module__update'));
    }
}

export const module = new Module();
