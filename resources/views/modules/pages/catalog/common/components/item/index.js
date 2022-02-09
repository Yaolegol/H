import {debounce} from "helpers/debounce";
import './index.less';

console.log('--- item file root');

const click = () => {
    console.log('CLICK')
}

const handleClick = (e) => {
    debounce(click, 1000);
}

document.addEventListener('click', handleClick);
