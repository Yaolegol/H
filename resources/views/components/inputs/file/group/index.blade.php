<div class="inputs-file-group j-inputs-file-group">
    @for ($i = 0; $i < $fileInputsCount; $i++)
        @include('components.inputs.file.item.index', [
            'name' => 'photo' . '_' . $i,
            'title' => 'Добавить фото',
            'withPreviewFile' => true,
        ])
    @endfor
</div>
