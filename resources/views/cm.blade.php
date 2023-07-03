@extends('wrap')

@section('container')
<body id="app-layout">
    @include('layouts.header')
    <main class="container">
        <div class="d-flex flex-row justify-content-center">
            @include('layouts.subnav',config('menu.'.Str::before(Route::currentRouteName(), '.')))
            <div class="col-12 innerWrap">   <!-- 서브메뉴 호출시 col-lg-9 추가 -->
                <div class="d-flex justify-content-between align-items-center">
                    <h4>{{ __(Route::currentRouteName()) }}</h4>
                    <div class="d-none d-sm-block text-muted text-sm">HOME &gt; {{ __(Str::before(Route::currentRouteName(), '.').'.title') }} &gt; {{
                        __(Route::currentRouteName())
                        }}</div>
                </div>
                <hr>
                @if(Session::has('status'))
                <p class="alert alert-info">{{ Session::get('status') }}</p>
                @endif
                @yield('content')
            </div>
        </div>
    </main>
    @include('layouts.footer')
</body>
@endsection

@push('styles')
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
@endpush
