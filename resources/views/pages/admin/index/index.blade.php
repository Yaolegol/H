<link
    href="{{ custom_getBuildFilePath('admin_index', 'css') }}"
    rel="stylesheet"
>
<link
    href="{{ custom_getBuildFilePath('vendors', 'css') }}"
    rel="stylesheet"
>

@include('modules.pages.admin.routes.index.index')

<script
    defer
    src="{{ custom_getBuildFilePath('admin_index', 'js') }}"
></script>
<script
    defer
    src="{{ custom_getBuildFilePath('vendors', 'js') }}"
></script>
