@extends('admin')
@section('content')
    @if ($message = Session::get('notice'))
    <script>
        const warning = '{{ $message }}'
        alert(warning);
    </script>
    @endif
    <style>
        .row{
            margin-left: 0;
            margin-right: 0;
        }
    </style>
    <div class="container">
        <div class="pt-3 pb-3 border-bottom">
            <h2><strong>{{ config('cm.submit.title') }}</strong></h2>
        </div>
        <div class="row border-bottom pt-3 pb-3">
            <div>
                <button type="button" class="btn btn-info" onclick="document.location.href='{{ route('admin.submit.excel') }}'">EXCEL 다운로드</button>
            </div>
        </div>



        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        @foreach ( config('cm.submit')['table'] as $k => $v )
                            <th>{{ $v }}</th>
                        @endforeach
                    </tr>
                </thead>

                <tbody style="font-size:15px;">
                    @foreach ($list as $k => $v )
                    <tr>
                        <td>{{ $no - $loop->iteration }}</td>
                        <td>{{ $v->level }}</td>
                        <td>{{ $v->option }}</td>
                        <td>{{ number_format($v->price).'원' }}</td>
                        <td>{{ $v->name }}</td>
                        <td>{{ $v->sosok }}</td>
                        <td>{{ $v->job }}</td>
                        <td>{{ $v->email }}</td>
                        <td>{{ $v->cellphone }}</td>
                        <td>
                            @if(Route::is('admin.submit.list'))
                            {!! Form::open([
                                'route'  => 'admin.submit.status',
                                'method' => 'post'
                            ]) !!}
                            <select name="status"  class="form-control" style="padding: 0;height:2rem;" onchange="submit();">
                                <option value="접수중" {{ $v->status=='접수중'?'selected=selected':'' }}>접수중</option>
                                <option value="결제완료" {{ $v->status=='결제완료'?'selected=selected':'' }}>결제완료</option>
                            </select>
                            <input type="hidden" name="id" value="{{ $v->id }}">
                            {!! Form::close() !!}
                            @elseif(Route::is('admin.submit.trash'))
                            {{ $v['status'] }}
                            @endif
                        </td>
                        <td>
                            @if(Route::is('admin.submit.list'))
                            <button style="padding: 0.1rem 0.5rem; font-size:12px;" class="btn btn-danger" type="button" onclick="if(confirm('삭제 하시겠습니까?')) document.location.href='{{ route('admin.submit.delete',$v['id']) }}'")>삭제</button>
                            @elseif(Route::is('admin.submit.trash'))
                            <button style="padding: 0.1rem 0.5rem; font-size:12px;" class="btn btn-info" type="button" onclick="if(confirm('복원 하시겠습니까?')) document.location.href='{{ route('admin.submit.delete.restore',$v['id']) }}'")>복원</button>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-12">
            <div class="text-center">
                {{-- {{ $list->links() }} --}}
            </div>
        </div>
        <div class="float-right">
            <button class="btn btn-outline-info" onclick="location.href='{{ route('admin.submit.list') }}'">{{ config('cm.submit.title') }}</button>
            <button class="btn btn-outline-danger" onclick="location.href='{{ route('admin.submit.trash') }}'">휴지통</button>
        </div>
    </div>
@endsection

