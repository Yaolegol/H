@extends('modules.layout.index')

@section('content')
    @include('modules.header.catalog.index')
    @include('modules.offers.offer.index')
@endsection

@section('scripts')
    <script src="{{ asset('build/index.bundle.js') }}" defer></script>
    <script src="{{ asset('build/vendor.bundle.js') }}" defer></script>
@endsection

@section('styles')
    <link href="{{ asset('build/index.css') }}" rel="stylesheet">
    <link href="{{ asset('build/vendor.css') }}" rel="stylesheet">
@endsection


