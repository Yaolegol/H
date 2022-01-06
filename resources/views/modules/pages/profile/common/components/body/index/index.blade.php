<div class="modules-pages-profile-common-components-body-index">
    <div class="modules-pages-profile-common-components-body-index__create-link-container">
        <a
            class="modules-pages-profile-common-components-body-index__create-link"
            href="{{$createLink}}"
        >
            {{$createTitle}}
        </a>
    </div>
    <div class="modules-pages-profile-common-components-body-index__content-container">
        <div class="modules-pages-profile-common-components-body-index__title-container">
            <h2>{{$title}}</h2>
        </div>
        {{$slot}}
    </div>
</div>


