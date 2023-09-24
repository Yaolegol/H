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
            <h4>{{$title}}</h4>
        </div>
        {{$slot}}
    </div>
</div>


