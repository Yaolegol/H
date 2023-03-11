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
    <div class="components-inputs-radio-group-second-level__content-block j-components-inputs-radio-checkbox-group">
        <input
            @foreach($contentList as $contentItem)
                @foreach($contentItem['content'] as $contentItem)
                    @if($item['isChecked'] ?? false)
                        checked

                        @break
                    @endif
                @endforeach
            @endforeach
            class="components-inputs-radio-checkbox-group__input j-components-inputs-radio-checkbox-group__hidden-input"
            name="{{$inputsName}}"
            @if($required)
                required
            @endif
            type="checkbox"
        >
        @foreach($contentList as $contentItem)
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
        @endforeach
    </div>
</div>


