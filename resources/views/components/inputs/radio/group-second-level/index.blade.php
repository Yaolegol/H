<div
    class="
        components-inputs-radio-group-second-level
        components-inputs-radio-group-second-level_hidden
        j-inputs-radio-group-second-level
    "
    data-listen-group-name="{{$listenGroupName}}"
>
    <div class="components-inputs-radio-group-second-level__title">
        {{$title}}
        @isset($required)
            *
        @endisset
    </div>
    <div
        class="components-inputs-radio-group-second-level__content-block"
        data-listen-group-name="{{$listenGroupName}}"

    >
        <input
            @foreach($contentList as $contentItem)
                @foreach($contentItem['content'] as $contentItemContent)
                    @if($contentItemContent['isChecked'] ?? false)
                        checked

                        @break
                    @endif
                @endforeach
            @endforeach
            class="components-inputs-radio-checkbox-group__input j-inputs-radio-group-second-level__hidden-input"
            name="{{$inputsName}}"
            @if($required ?? false)
                required
            @endif
            type="checkbox"
        >
        @foreach($contentList as $contentItem)
            @if(count($contentItem['content']) > 0)
                <div
                    class="
                    components-inputs-radio-group-second-level__content-container
                    j-inputs-radio-group-second-level__content-container
                "
                    data-listen-id="{{$contentItem['listenId']}}"
                >
                    @include('components.inputs.radio.checkbox-group.index', [
                        'list' => $contentItem['content'],
                        'name' => $inputsName,
                        'required' => $required ?? false,
                    ])
                </div>
            @endif
        @endforeach
    </div>
</div>


