@extends('wrap')

@section('container')
<body style="background:#f1f7fc">
    @include('admin.layouts.header')
    @yield('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    {{-- ks 20221109 --}}
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
</body>
@endsection

@push('styles')
<link href="http://cm.kasohn.scholars.link/css/admin.css" rel="stylesheet">
@endpush
