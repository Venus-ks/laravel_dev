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
        .col{
            padding-left: 0;
            padding-right: 0;
        }
    </style>
    <div class="container">
        <div class="pt-3 pb-3 border-bottom">
            <h2><strong>{{ config('cm.lecture.title') }}</strong></h2>
        </div>
        <div class="pt-3">
            <button type="button" class="btn btn-info" onclick="document.location.href='{{ route('admin.lecture.excel') }}'">EXCEL 다운로드</button>
        </div>
        <div class="row border-bottom pt-3 pb-3 ">
            <div class="col row">
                <div>
                    {!! Form::select('t', [null=>'= Select Presentation Type =']+config('cm.presentationType'), app('request')->input('t') ?? 'PP',array('class'=>'form-control','onchange'=>'abstract_form.submit();')); !!}
                </div>
                <div>
                    {!! Form::select('c', [null=>'= Select Category Type =']+config('cm.category'), app('request')->input('c'),array('class'=>'form-control','onchange'=>'abstract_form.submit();')); !!}
                </div>
                <div>
                    <div class="input-group">
                        <input type="text" class="form-control" aria-label="..." name="sw" placeholder="name / email / subject">
                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-default">Find</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       


        <div class="table-responsive">
            <table class="table">
                <thead> 
                    <tr>
                        @foreach ( config('cm.lecture')['table'] as $k => $v )
                            <th>{{ $v }}</th>
                        @endforeach
                    </tr>
                </thead>

                <tbody style="font-size:15px;">
                    @foreach ($list as $k => $v )
                    <tr>
                        <td>{{ $no - $loop->iteration }}</td>
                        <td>{{ $v['name'] }}</td>
                        <td>{{ $v['email'] }}</td>
                        <td>{{ $v['password'] }}</td>
                        <td>{{ $v['title'] }}</td>
                        <td>{{ $v['country'] }}</td>
                        <td>{{ Str::substr($v -> created_at,0,10) }}</td>
                        <td>
                            @if(Route::is('admin.lecture.list'))
                            <button style="padding: 0.1rem 0.5rem; font-size:12px;" class="btn btn-info" type="button" onclick="if(confirm('수정 하시겠습니까?')) document.location.href='{{ route('lecture.edit',$v['id']) }}'")>수정</button>
                            <button style="padding: 0.1rem 0.5rem; font-size:12px;" class="btn btn-danger" type="button" onclick="if(confirm('삭제 하시겠습니까?')) document.location.href='{{ route('admin.lecture.delete',$v['id']) }}'")>삭제</button>
                            @endif
                            @if(Route::is('admin.lecture.trash'))
                            <button style="padding: 0.1rem 0.5rem; font-size:12px;" class="btn btn-info" type="button" onclick="if(confirm('복원 하시겠습니까?')) document.location.href='{{ route('admin.lecture.delete.restore',$v['id']) }}'")>복원</button>
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
            <button class="btn btn-outline-info" onclick="location.href='{{ route('admin.lecture.list') }}'">{{ config('cm.lecture.title') }}</button>
            <button class="btn btn-outline-danger" onclick="location.href='{{ route('admin.lecture.trash') }}'">휴지통</button>
        </div>
    </div>
@endsection

