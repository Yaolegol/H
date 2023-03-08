<div class="modules-pages-profile-common-components-body-create">
    <div class="modules-pages-profile-common-components-body-create__all-points-link-container">
        <a
            class="modules-pages-profile-common-components-body-create__all-points-link"
            href="{{$backLink}}"
        >
            {{$backTitle}}
        </a>
    </div>
    <div class="modules-pages-profile-common-components-body-create__title-container">
        <h2>{{$title}}</h2>
    </div>
    <div class="modules-pages-profile-common-components-body-create__description-container">
        * отмечены поля, обязательные для заполнения
    </div>
    <div class="modules-pages-profile-common-components-body-create__form-container">
        {{$slot}}
    </div>
</div>
