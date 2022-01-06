@extends('modules.common.layout.index')

@section('layout-styles')
    <link href="{{ asset('build/profile_organizationInfo_create.css') }}" rel="stylesheet">
    <link href="{{ asset('build/vendor.css') }}" rel="stylesheet">
@endsection

@section('layout-content')
    @include('modules.pages.profile.routes.organization-info.create.index')
@endsection

@section('layout-scripts')
    <script src="{{ asset('build/profile_organizationInfo_create.bundle.js') }}" defer></script>
    <script src="{{ asset('build/vendor.bundle.js') }}" defer></script>
@endsection
