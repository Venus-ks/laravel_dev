@extends('cm')

@section('content')
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">구분</th>
                    <th scope="col">내용</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">등록비</th>
                    <td>{{ $price }}</td>
                </tr>
                <tr>
                    <th scope="row">소속</th>
                    <td>{{ $sosok }}</td>
                </tr>
                <tr>
                    <th scope="row">직위</th>
                    <td>{{ $job }}</td>
                </tr>
                <tr>
                    <th scope="row">이메일</th>
                    <td>{{ $email }}</td>
                </tr>
                <tr>
                    <th scope="row">휴대폰</th>
                    <td>{{ $cellphone }}</td>
                </tr>
                <tr>
                    <th scope="row">등록상태</th>
                    <td>{{ $status }}</td>
                </tr>
            </tbody>
        </table>
        <div class="highlight-clean">
            <div class="buttons">
                <a href="{{ route('home') }}" class="btn btn-primary text-light" role="button">홈으로</a>
            </div>
            @if (@$status == '결제완료')
            <div class="buttons mt-3">
                <a href="{{ route('submit.print',['id' => $id, 'print'=> 'receipt']) }}" class="btn btn-primary text-light">영수증</a>    
                <a href="{{ route('submit.print',['id' => $id, 'print'=> 'certificate']) }}" class="btn btn-primary text-light">이수증</a>    
                {{-- <a href="{{ route('submit.certificate') }}" class="btn btn-primary text-light">이수증</a>     --}}
            </div>               
            @endif
        </div>
@endsection
