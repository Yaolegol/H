@extends('modules.common.layout.mobileApp.map.index')

@section('layout-styles')
    <link
        href="{{ custom_getBuildFilePath('map_mobileApp_singlePoint_index', 'css') }}"
        rel="stylesheet"
    >
    <link
        href="{{ custom_getBuildFilePath('vendors', 'css') }}"
        rel="stylesheet"
    >
@endsection

@section('layout-content')
    @include('modules.pages.map.mobileApp.singlePoint.index')
@endsection

@section('layout-scripts')
    <script
        defer
        src="{{ custom_getBuildFilePath('map_mobileApp_singlePoint_index', 'js') }}"
    ></script>
    <script
        defer
        src="{{ custom_getBuildFilePath('vendors', 'js') }}"
    ></script>
@endsection
