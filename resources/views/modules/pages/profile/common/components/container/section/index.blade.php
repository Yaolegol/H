<div class="modules-pages-profile-common-components-container-section">
    @isset($title)
        <h6>{{$title}}</h6>
    @endisset
        @isset($description)
            <div class="modules-pages-profile-common-components-container-section__description">{{$description}}</div>
        @endisset
    {{$slot}}
</div>


