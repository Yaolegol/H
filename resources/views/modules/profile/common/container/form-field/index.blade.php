<div class="profile-common-container-form-field">
    @isset($title)
        <div class="profile-common-container-form-field__title">{{$title}}</div>
        <div class="profile-common-container-form-field__content-container">
            {{$slot}}
        </div>
    @else
        {{$slot}}
    @endisset
</div>


