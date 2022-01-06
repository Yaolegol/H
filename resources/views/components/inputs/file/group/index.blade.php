<div class="components-inputs-file-group j-inputs-file-group">
    @for ($i = 1; $i <= $fileInputsCount; $i++)
        <div class="components-inputs-file-group__item-container">
            @include('components.inputs.file.item.index', [
                'name' => $name . '_' . $i,
                'title' => $title . ' №' . $i,
                'withPreviewFile' => true,
            ])
        </div>
    @endfor
</div>
