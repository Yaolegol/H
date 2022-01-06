@extends('modules.common.layout.index')

@section('layout-styles')
    <link href="{{ asset('build/profile_salePointsInfo_edit.css') }}" rel="stylesheet">
    <link href="{{ asset('build/vendors.css') }}" rel="stylesheet">
@endsection

@section('layout-content')
    @include('modules.pages.profile.routes.sale-points-info.edit.index')
@endsection

@section('layout-scripts')
    <script src="{{ asset('build/profile_salePointsInfo_edit.bundle.js') }}" defer></script>
    <script src="{{ asset('build/vendors.bundle.js') }}" defer></script>
@endsection
