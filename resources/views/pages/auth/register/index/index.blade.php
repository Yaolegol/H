@extends('modules.common.layout.index', [
    'withoutOffset' => true
])

@section('layout-styles')
    <link href="{{ asset('build/auth_register_index.css') }}" rel="stylesheet">
    <link href="{{ asset('build/vendor.css') }}" rel="stylesheet">
@endsection

@section('layout-content')
    @include('modules.pages.auth.routes.register.index.index')
@endsection

@section('layout-scripts')
    <script src="{{ asset('build/auth_register_index.js') }}" defer></script>
    <script src="{{ asset('build/vendor.bundle.js') }}" defer></script>
@endsection
