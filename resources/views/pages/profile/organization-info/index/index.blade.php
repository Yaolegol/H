@extends('modules.layout.index')

@section('layout-content')
    @include('modules.header.catalog.index')
    @include('modules.profile.layout.index', [$section = 'organization-info/index'])
@endsection

@section('layout-scripts')
    <script src="{{ asset('build/index.bundle.js') }}" defer></script>
@endsection

@section('layout-styles')
    <link href="{{ asset('build/index.css') }}" rel="stylesheet">
@endsection


