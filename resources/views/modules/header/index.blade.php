@extends('components.modals.common.index')

<div class="header">
    <div class="header__map-block">
        <div class="header__map-container">
            <a class="header__map-link" href="/">Карта</a>
        </div>
    </div>
    <div class="header__main">
        <div class="header__logo-container">
            @include('icons.logo')
        </div>
        <div>
            @include('components.buttons.burger.index')
        </div>
        <div>
            @include('components.inputs.search.index')
        </div>
        <div class="header__location-container">
            @include('components.buttons.location.index')
        </div>
        <div class="header__favorites-container">
            @include('icons.favorite')
        </div>
        <div class="header__profile-container">
            <a class="header__profile-link" href="/profile">
                @include('icons.profile')
            </a>
        </div>
        @auth
            <div class="header__login-container">
                <a class="header__login-link" href="/logout">Выйти</a>
            </div>
        @endauth

        @guest
            <div class="header__login-container">
                <a class="header__login-link" href="/login">Войти</a>
            </div>
        @endguest
    </div>
</div>

@section('modals-common-content')
    @include('modules.header.location.modalContent.index')
@endsection
