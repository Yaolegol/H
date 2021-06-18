<div class="catalog-item">
    <div class="catalog-item__image-container">
        <img alt="{{$catalogItem['title']}}" class="catalog-item__image" src="{{$catalogItem['image']}}" >
    </div>
    <div class="catalog-item__content-container">
        <div class="catalog-item__title">
            {{$catalogItem['title']}}
        </div>
    </div>
    <a class="catalog-item__link" href="{{$catalogItem['link']}}"></a>
</div>
