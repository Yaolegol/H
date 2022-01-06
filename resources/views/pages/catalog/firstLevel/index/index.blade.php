@extends('modules.common.layout.web.index')

@section('layout-styles')
    <link
        href="{{ custom_getBuildFilePath('catalog_firstLevel_index', 'css') }}"
        rel="stylesheet"
    >
    <link
        href="{{ custom_getBuildFilePath('vendors', 'css') }}"
        rel="stylesheet"
    >
@endsection

@section('layout-content')
    @include('modules.pages.catalog.common.routes.index.index')
@endsection

@section('layout-scripts')
    <script
        defer
        src="{{ custom_getBuildFilePath('catalog_firstLevel_index', 'js') }}"
    ></script>
    <script
        defer
        src="{{ custom_getBuildFilePath('vendors', 'js') }}"
    ></script>
@endsection
