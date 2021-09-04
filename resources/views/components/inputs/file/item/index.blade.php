<div
    class="inputs-file-item j-inputs-file-item"
    data-group-name="{{$groupName ?? ''}}"
    @if($withPreviewFile ?? false)
        data-with-preview-file
    @endif
>
    <div class="inputs-file-item__image-section j-inputs-file-item__image-container"></div>
    <div class="inputs-file-item__input-section">
        <label class="inputs-file-item__label" for="file-input-{{$name}}">{{$title}}</label>
        <input
            class="inputs-file-item__input j-inputs-file-item__input"
            id="file-input-{{$name}}"
            name="{{$name}}"
            type="file"
        >
    </div>
</div>
