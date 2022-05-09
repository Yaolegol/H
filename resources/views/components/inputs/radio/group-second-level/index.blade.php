<div
    class="
        components-inputs-radio-group-second-level
        components-inputs-radio-group-second-level_hidden
        j-inputs-radio-group-second-level
    "
    data-listen-group-name="{{$listenGroupName}}"
>
    <div class="components-inputs-radio-group-second-level__title">{{$title}}:</div>
    <div class="components-inputs-radio-group-second-level__content-block">
        @foreach($contentList as $contentItem)
            <div
                class="
                    components-inputs-radio-group-second-level__content-container
                    j-inputs-radio-group-second-level__content-container
                "
                data-listen-id="{{$contentItem['listenId']}}"
            >
                @foreach($contentItem['content'] as $item)
                    @include('components.inputs.radio.item.index', [
                        'isChecked' => $item['isChecked'] ?? false,
                        'name' => $inputsName,
                        'required' => $required ?? false,
                        'title' => $item['title'],
                        'value' => $item['value'],
                    ])
                @endforeach
            </div>
        @endforeach
    </div>
</div>


