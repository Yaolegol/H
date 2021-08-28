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
                @include('components.inputs.radio.group.index', [
                        'dispatchEvents' => false,
                        'groupName' => $contentItem['groupName'],
                        'inputName' => $contentItem['inputName'],
                        'itemsList' => $contentItem['content'],
                    ])
            </div>
        @endforeach
    </div>
</div>


