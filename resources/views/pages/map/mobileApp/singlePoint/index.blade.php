@extends('modules.common.layout.mobileApp.map.index')

@section('layout-content')
    @include('modules.pages.map.mobileApp.singlePoint.index')
@endsection

@section('layout-scripts')
    <script src="{{ asset('build/index.bundle.js') }}" defer></script>
    <script src="{{ asset('build/vendors.bundle.js') }}" defer></script>
@endsection

@section('layout-styles')
    <link href="{{ asset('build/index.css') }}" rel="stylesheet">
    <link href="{{ asset('build/vendors.css') }}" rel="stylesheet">
@endsection
