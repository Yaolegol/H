@extends('modules.common.layout.index')

@section('layout-styles')
    <link href="{{ asset('build/catalog_secondLevel_index.css') }}" rel="stylesheet">
    <link href="{{ asset('build/vendor.css') }}" rel="stylesheet">
@endsection

@section('layout-content')
    @include('modules.pages.catalog.common.routes.index.index')
@endsection

@section('layout-scripts')
    <script src="{{ asset('build/catalog_secondLevel_index.bundle.js') }}" defer></script>
    <script src="{{ asset('build/vendor.bundle.js') }}" defer></script>
@endsection
