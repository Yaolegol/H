<div
    class="
        modules-pages-profile-common-components-container-form-field
        {{$withoutOffset ?? false ? "modules-pages-profile-common-components-container-form-field_without-offset" : ""}}
        {{$fullHeight ?? false ? 'modules-pages-profile-common-components-container-form-field_full-height' : ''}}
    "
>
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


