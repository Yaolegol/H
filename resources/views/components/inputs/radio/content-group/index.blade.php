<div
    class="
        inputs-radio-content
        inputs-radio-content_hidden
        j-inputs-radio-content-group
    "
    data-listen-group-name="{{$listenGroupName}}"
>
    <div class="inputs-radio-content__title">{{$title}}:</div>
    <div class="inputs-radio-content__content-block">
        @foreach($contentList as $contentItem)
            <div
                class="
                    inputs-radio-content__content-container
                    j-inputs-radio-content-group__content-container
                "
                data-listen-id="{{$contentItem['listenId']}}"
            >
                @foreach($contentItem['content'] as $item)
                    @include('components.inputs.radio.item.index', [
                        'id' => $item['id'],
                        'isChecked' => $item['isChecked'] ?? false,
                        'name' => $contentItem['inputName'],
                        'title' => $item['title'],
                        'value' => $item['value'],
                    ])
                @endforeach
            </div>
        @endforeach
    </div>
</div>


