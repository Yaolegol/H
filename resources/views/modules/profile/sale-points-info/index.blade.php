<div class="profile-sale-points-info">
    <div class="profile-sale-points-info__content-container">
        <h2>Информация о торговых точках организации</h2>
        @for ($i = 0; $i < 15; $i++)
            <div class="profile-sale-points-info__sale-point-container">
                @include('modules.profile.sale-points-info.salePoint.index', ['index' => $i])
            </div>
        @endfor
    </div>
</div>


