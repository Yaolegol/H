@extends('modules.common.layout.web.index', [
    'withoutOffset' => true
])

@section('layout-styles')
    <link
        href="{{ custom_getBuildFilePath('auth_register_index', 'css') }}"
        rel="stylesheet"
    >
    <link
        href="{{ custom_getBuildFilePath('vendors', 'css') }}"
        rel="stylesheet"
    >
@endsection

@section('layout-content')
    @include('modules.pages.auth.routes.register.index.index')
@endsection

@section('layout-scripts')
    <script
        defer
        src="{{ custom_getBuildFilePath('auth_register_index', 'js') }}"
    ></script>
    <script
        defer
        src="{{ custom_getBuildFilePath('vendors', 'js') }}"
    ></script>
@endsection
