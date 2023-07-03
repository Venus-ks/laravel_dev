@extends('admin')
@section('content')
<div class="login-clean">
    @if ($message = Session::get('notice'))
    <script>
        const warning = '{{ $message }}'
        alert(warning);
    </script>
    @endif
    {!! Form::open([
        'route' => 'admin.login',
        'method'=> 'post'
    ]) !!}
    {!! csrf_field() !!}
    <h2 class="sr-only">Login Form</h2>
    <div class="illustration">
        <i class="icon ion-lock-combination"></i>
    </div>
    <div class="form-group"><input class="form-control" name="id" type="email" name="email" placeholder="Email"></div>
    <div class="form-group"><input class="form-control" name="pw" type="password" name="password"
            placeholder="Password"></div>
    <!--div class="form-group">
            <div class="checkbox"><label class="control-label">
                <input type="checkbox">Remember Me</label>
            </div>
        </div-->
    <div class="form-group">
        <button class="btn btn-primary btn-block text-light" type="submit">Log In</button>
    </div>
    <!--a href="#" class="forgot">Forgot your email or password?</a-->
    {!! Form::close() !!}
</div>
@endsection
