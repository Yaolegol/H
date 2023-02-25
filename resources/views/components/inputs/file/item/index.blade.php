<div
    class="
        components-inputs-file-item
        @if($imageSrc ?? false)
            components-inputs-file-item_with-image
        @endif
        j-inputs-file-item
    "
    @if($withPreviewFile ?? false)
        data-with-preview-file
    @endif
>
    <div class="components-inputs-file-item__content-section j-inputs-file-item__content-section">
        <div class="components-inputs-file-item__image-container j-inputs-file-item__image-container">
            @if($imageSrc ?? false)
                <img
                    alt=""
                    class="components-inputs-file-item__image"
                    src="{{$imageSrc}}"
                >
            @endif
        </div>
        <div class="components-inputs-file-item__buttons-section">
            <button
                class="j-inputs-file-item__change-file-button"
                type="button"
            >
                Редактировать
            </button>
            <button
                class="components-inputs-file-item__remove-button j-inputs-file-item__remove-file-button"
                type="button"
            >
                Удалить
            </button>
        </div>
    </div>
    <div class="components-inputs-file-item__input-section j-inputs-file-item__input-section">
        <label class="components-inputs-file-item__label" for="file-input-{{$name}}">{{$title}}</label>
        <input
            class="components-inputs-file-item__input j-inputs-file-item__input"
            id="file-input-{{$name}}"
            name="{{$name}}"
            type="file"
        >
    </div>
</div>
