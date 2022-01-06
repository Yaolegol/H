import Swiper from 'swiper/swiper-bundle.min';
import 'swiper/swiper-bundle.min.css';
import 'views/components/sliders/base/slide';
import './index.less';

class SlidersBase {
    constructor(element) {
        this.module = element;
        this.swiperContainer = this.module.querySelector('.j-sliders-base__swiper-container');
        this.swiperArrowNextContainer = this.module.querySelector('.j-sliders-base__arrow-next-container');
        this.swiperArrowPrevContainer = this.module.querySelector('.j-sliders-base__arrow-prev-container');
        this.swiperPaginationContainer = this.module.querySelector('.j-sliders-base__pagination-container');

        this.init();
    }

    init = () => {
        this.swiper = new Swiper(this.swiperContainer, {
            navigation: {
                nextEl: this.swiperArrowNextContainer,
                prevEl: this.swiperArrowPrevContainer,
            },
            pagination: {
                clickable: true,
                el: this.swiperPaginationContainer,
            },
        });
    }
}

const list = [...document.querySelectorAll('.j-sliders-base')];

list.forEach((element) => {
    new SlidersBase(element);
})
