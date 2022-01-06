@extends('modules.common.layout.web.index')

@section('layout-styles')
    <link
        href="{{ custom_getBuildFilePath('sellers_show', 'css') }}"
        rel="stylesheet"
    >
    <link
        href="{{ custom_getBuildFilePath('vendors', 'css') }}"
        rel="stylesheet"
    >
@endsection

@section('layout-content')
    @include('modules.pages.sellers.show.index')
@endsection

@section('layout-scripts')
    <script
        defer
        src="{{ custom_getBuildFilePath('sellers_show', 'js') }}"
    ></script>
    <script
        defer
        src="{{ custom_getBuildFilePath('vendors', 'js') }}"
    ></script>
@endsection
