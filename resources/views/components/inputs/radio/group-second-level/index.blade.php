<div
    class="
        inputs-radio-group-second-level
        inputs-radio-group-second-level_hidden
        j-inputs-radio-group-second-level
    "
    data-listen-group-name="{{$listenGroupName}}"
>
    <div class="inputs-radio-group-second-level__title">{{$title}}:</div>
    <div class="inputs-radio-group-second-level__content-block">
        @foreach($contentList as $contentItem)
            <div
                class="
                    inputs-radio-group-second-level__content-container
                    j-inputs-radio-group-second-level__content-container
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


