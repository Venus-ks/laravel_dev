@extends('cm')
@section('content')
    {{ Form::open(['url' => route('submit.login')]) }}
    <div class="row p-4 bg-light text-center">
        <div class="col-md-12 mb-3">
            <h5>사전등록시 입력하신&nbsp;이메일과 이름을 입력해 주세요. </h5>
        </div>
        <div class="col-md-12">
            <div class="form-group"><label><strong>E-mail</strong> </label>
                <input class="form-control" type="text" name="email" value="{{old('email')}}">
            </div>
            <div class="form-group"><label><strong>이름</strong> </label>
                <input class="form-control" type="text" name="name" value="{{old('name')}}">
            </div>
        </div>
    </div>
    <div class="highlight-clean">
        <div class="buttons"><button class="btn btn-primary text-light" role="button">사전등록 확인 </button></div>
    </div>
    {{ Form::close() }}
@endsection
