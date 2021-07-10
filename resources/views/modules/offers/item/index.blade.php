<div class="offers-item">
    <div class="offers-item__image-block">
        <div class="offers-item__image-container">
            <img alt="{{$offer['title']}}" class="offers-item__image" src="{{$offer['image']}}">
        </div>
    </div>
    <div class="offers-item__content-block">
        <div>
            <a href="{{$offer['offerLink']}}">{{$offer['title']}}</a>
        </div>
        <div>
            <a href="/sellers/{{$offer['seller']['id']}}">{{$offer['seller']['name']}}</a>
        </div>
        <div>{{$offer['seller']['region']['title']}}</div>
    </div>
</div>


