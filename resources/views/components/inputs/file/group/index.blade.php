<div
    class="inputs-file-group j-inputs-file-group"
    data-group-name="{{$groupName}}"
>
    <div class="inputs-file-group__image-list-container j-inputs-file-group__image-list-container"></div>
    @include('components.inputs.file.item.index', [
        'groupName' => $groupName,
        'name' => 'photo',
        'title' => 'Добавить фото',
   ])
</div>
