import Swiper from 'swiper/swiper-bundle.min';
import 'swiper/swiper-bundle.min.css';
import 'views/components/sliders/base/slide';
import './index.less';

class SlidersBase {
    constructor(element) {
        this.module = element;
        this.swiperContainer = this.module.querySelector('.j-sliders-base__swiper-container');

        this.init();
    }

    init = () => {
        this.swiper = new Swiper(this.swiperContainer, {
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                clickable: true,
                el: '.swiper-pagination',
            },
        });
    }
}

const list = [...document.querySelectorAll('.j-sliders-base')];

list.forEach((element) => {
    new SlidersBase(element);
})
