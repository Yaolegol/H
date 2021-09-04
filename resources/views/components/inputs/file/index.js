import './index.less';

class InputsFile {
    constructor(element) {
        this.module = element;
    }
}

const list = [...document.querySelectorAll('.j-inputs-file')];

list.forEach((element) => {
    new InputsFile(element);
});
