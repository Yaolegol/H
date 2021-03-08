@extends('modules.layout.index')

@section('content')
    <div>
        Home!!!
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('build/index.bundle.js') }}" defer></script>
@endsection

@section('styles')
    <link href="{{ asset('build/index.css') }}" rel="stylesheet">
@endsection


