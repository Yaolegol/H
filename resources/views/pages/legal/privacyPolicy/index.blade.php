@extends('modules.common.layout.web.index', [
    'withoutOffset' => true
])

@section('layout-styles')
    <link
        href="{{ custom_getBuildFilePath('legal_privacyPolicy', 'css') }}"
        rel="stylesheet"
    >
    <link
        href="{{ custom_getBuildFilePath('vendors', 'css') }}"
        rel="stylesheet"
    >
@endsection

@section('layout-content')
    @include('modules.pages.legal.routes.privacyPolicy.index')
@endsection

@section('layout-scripts')
    <script
        defer
        src="{{ custom_getBuildFilePath('legal_privacyPolicy', 'js') }}"
    ></script>
    <script
        defer
        src="{{ custom_getBuildFilePath('vendors', 'js') }}"
    ></script>
@endsection
