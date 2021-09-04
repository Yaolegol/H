import {addEventListener} from 'helpers/events';
import 'views/components/inputs/file/item';
import './index.less';

class InputsFileGroup {
    constructor(element) {
        this.module = element;
    }
}

const list = [...document.querySelectorAll('.j-inputs-file-group')];

list.forEach((element) => {
    new InputsFileGroup(element);
});
