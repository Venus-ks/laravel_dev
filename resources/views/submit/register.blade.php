@extends('cm')

@section('content')
{{ Form::open(['url' => route('submit.store'),'id'=>'submitForm']) }}
@if ($errors->any())
<div class="alert alert-danger">
        @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
        @endforeach
</div>
@endif
<div class="p-2">
    <div class="sub-tit">
        <h5>신청자 정보 입력</h5>
    </div>
    <div class="py-4">
        <x-forms.select label="등록구분" name="level" :option="config('cm.preRegistrationLevel')" :attr="['class'=>'form-control','onchange'=>'submitForm.price.value = priceByLevel(this.value)']" required>
            === 선택 ===
        </x-forms.select>
        <x-forms.select label="급수" name="option" :option="config('cm.preRegistrationOption')" :attr="['class'=>'form-control']" required>
            === 선택 ===
        </x-forms.select>
        <x-forms.input type="number" name="price" label="등록비" example="※ 등록구분 선택시 자동입력" placeholder="자동입력" required readonly/>
        <x-forms.input type="text" name="name" label="이름" required>{{old('name')}}</x-forms.input>
        <x-forms.input type="text" name="sosok" label="소속">{{old('job')}}</x-forms.input>
        <x-forms.input type="text" name="job" label="직위">{{old('job')}}</x-forms.input>
        <x-forms.input type="email" name="email" label="E-mail" required>{{old('email')}}</x-forms.input>
        <x-forms.input type="text" name="cellphone" label="휴대폰번호" required>{{old('cellphone')}}</x-forms.input>
    </div>
    <div class="alert alert-info" role="alert">
        {!! config('cm.account-msg') !!}
    </div>
</div>
<hr>
<div class="highlight-clean">
    <div class="buttons">
        <button class="btn btn-primary text-light" role="button">등록 (Submit) </button>
        <a class="btn btn-danger text-light" type="button"
            href="@if(Auth::check()) {{route('lecture.index')}} @else {{url("/")}} @endif">취소 (Cancel)</a>
    </div>
</div>
{{ Form::close() }}
<script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
<script>
    $(function(){
    $("select[name=sosok]").change(function(){
    $("input[name=price]").val($("select[name=sosok] option:selected").attr("price"));
    });
    });
    //load함수를 이용하여 core스크립트의 로딩이 완료된 후, 우편번호 서비스를 실행합니다.
    function execDaumPostcode() {
    new daum.Postcode({
    oncomplete: function(data) {
    // 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.

    // 각 주소의 노출 규칙에 따라 주소를 조합한다.
    // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
    var fullAddr = ''; // 최종 주소 변수
    var extraAddr = ''; // 조합형 주소 변수

    // 사용자가 선택한 주소 타입에 따라 해당 주소 값을 가져온다.
    if (data.userSelectedType === 'R') { // 사용자가 도로명 주소를 선택했을 경우
    fullAddr = data.roadAddress;

    } else { // 사용자가 지번 주소를 선택했을 경우(J)
    fullAddr = data.jibunAddress;
    }

    // 사용자가 선택한 주소가 도로명 타입일때 조합한다.
    if(data.userSelectedType === 'R'){
    //법정동명이 있을 경우 추가한다.
    if(data.bname !== ''){
    extraAddr += data.bname;
    }
    // 건물명이 있을 경우 추가한다.
    if(data.buildingName !== ''){
    extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
    }
    // 조합형주소의 유무에 따라 양쪽에 괄호를 추가하여 최종 주소를 만든다.
    fullAddr += (extraAddr !== '' ? ' ('+ extraAddr +')' : '');
    }

    // 우편번호와 주소 정보를 해당 필드에 넣는다.
    document.getElementById('zip').value = data.zonecode; //5자리 새우편번호 사용
    document.getElementById('addr1').value = fullAddr;

    // 커서를 상세주소 필드로 이동한다.
    document.getElementById('addr2').focus();
    }
    }).open();
    }
</script>
@endsection

@push('scripts')
    <script>
        function priceByLevel(level) {
            priceMatrix = {{ Js::from(config('cm.prePriceForLevel')) }};
            return priceMatrix[level];
        }
    </script>
@endpush
