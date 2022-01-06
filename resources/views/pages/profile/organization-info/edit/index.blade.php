@extends('modules.common.layout.index')

@section('layout-styles')
    <link href="{{ asset('build/profile_organizationInfo_edit.css') }}" rel="stylesheet">
    <link href="{{ asset('build/vendor.css') }}" rel="stylesheet">
@endsection

@section('layout-content')
    @include('modules.pages.profile.routes.organization-info.edit.index')
@endsection

@section('layout-scripts')
    <script src="{{ asset('build/profile_organizationInfo_edit.bundle.js') }}" defer></script>
    <script src="{{ asset('build/vendor.bundle.js') }}" defer></script>
@endsection
