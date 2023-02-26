<link
    href="{{ custom_getBuildFilePath('admin_organizations', 'css') }}"
    rel="stylesheet"
>
<link
    href="{{ custom_getBuildFilePath('vendors', 'css') }}"
    rel="stylesheet"
>

<div class="j-csrf-token" data-value="{{ csrf_token() }}"></div>

@include('modules.pages.admin.routes.organizations.index')

<script
    defer
    src="{{ custom_getBuildFilePath('admin_organizations', 'js') }}"
></script>
<script
    defer
    src="{{ custom_getBuildFilePath('vendors', 'js') }}"
></script>
