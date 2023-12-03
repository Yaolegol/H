<link
    href="{{ custom_getBuildFilePath('admin_callback', 'css') }}"
    rel="stylesheet"
>
<link
    href="{{ custom_getBuildFilePath('vendors', 'css') }}"
    rel="stylesheet"
>

<div class="j-csrf-token" data-value="{{ csrf_token() }}"></div>

@include('modules.pages.admin.routes.callback.index')

<script
    defer
    src="{{ custom_getBuildFilePath('admin_callback', 'js') }}"
></script>
<script
    defer
    src="{{ custom_getBuildFilePath('vendors', 'js') }}"
></script>
