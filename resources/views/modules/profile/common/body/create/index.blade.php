<div class="profile-common-body-create">
    <div class="profile-common-body-create__all-points-link-container">
        <a
            class="profile-common-body-create__all-points-link"
            href="{{$backLink}}"
        >
            {{$backTitle}}
        </a>
    </div>
    <div class="profile-common-body-create__title-container">
        <h2>{{$title}}</h2>
    </div>
    <div class="profile-common-body-create__form-container">
        {{$slot}}
    </div>
</div>
