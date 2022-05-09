<div class="modules-pages-profile-common-components-container-form-field">
    @isset($title)
        <div class="modules-pages-profile-common-components-container-form-field__title">
            {{$title}}
            @isset($required)
                *
            @endisset
        </div>
        <div class="modules-pages-profile-common-components-container-form-field__content-container">
            {{$slot}}
        </div>
    @else
        {{$slot}}
    @endisset
</div>


