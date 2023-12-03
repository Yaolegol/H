<div class="modules-common-callback-new">
    <div class="modules-common-callback-new__title">
        Укажите телефон и мы свяжемся с Вами, чтобы рассказать о проекте!
    </div>
    <div class="modules-common-callback-new__area-input">
        @include('components.inputs.send.index', [
            'className' => 'j-modules-common-callback-new',
            'classNameButton' => 'j-modules-common-callback-new__button',
            'classNameInput' => 'j-modules-common-callback-new__input',
            'name' => 'test',
            'placeholder' => 'Телефон и комментарий',
            'required' => true,
        ])
    </div>
</div>
