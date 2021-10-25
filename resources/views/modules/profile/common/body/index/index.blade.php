<div class="profile-common-body-index">
    <div>
        <a
            class="profile-common-body-index__create-link"
            href="{{$createLink}}"
        >
            {{$createTitle}}
        </a>
    </div>
    <div class="profile-common-body-index__content-container">
        <h2>{{$title}}</h2>
        {{$slot}}
    </div>
</div>


