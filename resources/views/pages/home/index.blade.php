@extends('modules.layout.index')

@section('content')
    @include('modules.catalog.index')
    @include('modules.home.index')
@endsection

@section('scripts')
    <script src="{{ asset('build/index.bundle.js') }}" defer></script>
@endsection

@section('styles')
    <link href="{{ asset('build/index.css') }}" rel="stylesheet">
@endsection


