<div class="modules-pages-copyright-routes-images">
    <div class="modules-pages-copyright-routes-images__container">
        <h5 class="modules-pages-copyright-routes-images__title">
            Выражаем свою благодарность авторам изображений,
            <br />которые использованы на сайте
        </h5>
        <div class="modules-pages-copyright-routes-images__images-section">
            @foreach($copyrightImages as $copyrightImage)
                <div class="modules-pages-copyright-routes-images__image-item">
                    <img
                        alt="{{$copyrightImage['title']}}"
                        class="modules-pages-copyright-routes-images__image"
                        src="{{$copyrightImage['image']}}"
                    >
                    <div class="modules-pages-copyright-routes-images__image-item-title-container">
                        {!! $copyrightImage['image_licence_link'] !!}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
