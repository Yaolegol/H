@extends('modules.common.layout.index')

@section('layout-styles')
    <link href="{{ asset('build/sellers_show.css') }}" rel="stylesheet">
    <link href="{{ asset('build/vendors.css') }}" rel="stylesheet">
@endsection

@section('layout-content')
    @include('modules.pages.sellers.show.index')
@endsection

@section('layout-scripts')
    <script src="{{ asset('build/sellers_show.bundle.js') }}" defer></script>
    <script src="{{ asset('build/vendors.bundle.js') }}" defer></script>
@endsection
