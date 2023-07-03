@extends('cm')
@section('content')
    {{ Form::open(['url' => '/abstracts/login']) }}
    <section id="login">
        <div class="alert alert-primary w-100" role="alert">
            {{ __('messages.abs-login-msg') }}
        </div>

        <div class="login-box">
            <div class="form-group"><label>E-mail</label>
                <input class="form-control" type="text" name="email" value="{{old('email')}}">
            </div>
            <div class="form-group"><label>Password</label>
                <input class="form-control" type="password" name="password" value="{{old('password')}}">
            </div>
        </div>
    </section>

    <div class="text-center mt-4">
        <button class="btn btn-primary btn-lg text-light" role="button">{{ __('lecture.login') }}</button>
    </div>
    {{ Form::close() }}
@endsection
