@extends('modules.common.layout.index')

@section('layout-content')
    @component('modules.pages.profile.common.components.header.index', ['activeTab' => 'sale-offers'])
        @include('modules.pages.profile.routes.sale-offers.index.index')
    @endcomponent
@endsection

@section('layout-scripts')
    <script src="{{ asset('build/index.bundle.js') }}" defer></script>
    <script src="{{ asset('build/vendor.bundle.js') }}" defer></script>
@endsection

@section('layout-styles')
    <link href="{{ asset('build/index.css') }}" rel="stylesheet">
    <link href="{{ asset('build/vendor.css') }}" rel="stylesheet">
@endsection


