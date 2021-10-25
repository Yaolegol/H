@extends('modules.layout.index')

@section('layout-content')
    @include('modules.header.catalog.index')
    @component('modules.profile.common.header.index', ['activeTab' => 'organization-info'])
        @include('modules.profile.components.organization-info.create.index')
    @endcomponent
@endsection

@section('layout-scripts')
    <script src="{{ asset('build/index.bundle.js') }}" defer></script>
@endsection

@section('layout-styles')
    <link href="{{ asset('build/index.css') }}" rel="stylesheet">
@endsection


