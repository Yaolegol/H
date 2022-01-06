@extends('modules.common.layout.index', [
    'withoutOffset' => true
])

@section('layout-styles')
    <link href="{{ asset('build/auth_login_index.css') }}" rel="stylesheet">
    <link href="{{ asset('build/vendors.css') }}" rel="stylesheet">
@endsection

@section('layout-content')
    @include('modules.pages.auth.routes.login.index.index')
@endsection

@section('layout-scripts')
    <script src="{{ asset('build/auth_login_index.bundle.js') }}" defer></script>
    <script src="{{ asset('build/vendors.bundle.js') }}" defer></script>
@endsection
