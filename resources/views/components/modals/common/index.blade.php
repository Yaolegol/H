<div
    class="components-modals-common j-components-modals-common"
    data-name="{{$name}}"
>
    <div class="components-modals-common__body-block">
        <div class="components-modals-common__body-container">
            <div class="components-modals-common__body">
                <div class="components-modals-common__close-button-container">
                    <button
                        class="components-modals-common__close-button j-components-modals-common__close-button"
                        type="button"
                    >
                        @include('icons.close')
                    </button>
                </div>
                {{$slot}}
            </div>
        </div>
    </div>
</div>
