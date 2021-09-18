<div class="profile--sale-points-info--index">
    <div>
        <a
            class="profile--sale-points-info--index__create-link"
            href="/profile/sale-points-info/create"
        >
            Добавить торговую точку
        </a>
    </div>
    <div class="profile--sale-points-info--index__content-container">
        <h2>Ваши торговые точки</h2>
        @foreach ($salePointsList as $salePointItem)
            <div class="profile--sale-points-info--index__sale-point-container">
                {{$salePointItem['title']}}
            </div>
        @endforeach
    </div>
</div>


