import 'views/modules/auth/login';
import 'views/modules/header';
import 'views/modules/layout';
import './index.less';

console.log('>>>>> views/pages/auth/login')

const a = document.querySelector('.testtestestetestset');

try {
    a.classList.add('test');
} catch(err) {
    console.log('err')
    console.log(err)
}
