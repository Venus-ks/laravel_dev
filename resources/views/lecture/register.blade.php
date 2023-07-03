@extends('cm')

@section('content')
    {{ Form::open(['url' => route('lecture.store')]) }}
    {!! Form::token() !!}
    <section class="card">
        <h5 class="card-header">{{ __('lecture.guide') }}</h5>
        <div class="card-body">{!! __('messages.abs-guide-msg',['email' => config('cm.email')]) !!}</div>
    </section>

    <hr>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <section>
        <h5 class="sub-tit">{{ __('lecture.author-title') }}</h5>
        <div>
            <x-forms.input type="text" name="name" label="{{ __('lecture.name') }}" example="ex. Gil dong Hong or Tom Cruise (First name Last name)" required>{{ __('messages.abs-name-msg') }}</x-forms.input>
            <x-forms.input type="email" name="email" label="E-mail" required :disabled="isset($expt)">{{ __('messages.abs-email-msg') }}</x-forms.input>
            <x-forms.input type="text" name="country" label="{{ __('lecture.country') }}">{{ __('messages.abs-country-msg') }}</x-forms.input>
            <x-forms.input type="password" name="password" label="{{ __('lecture.password') }}" required/>
            <x-forms.input type="password" name="password_confirmation" label="{{ __('lecture.password-re') }}" required/>
        </div>
    </section>
    <hr>
    <section>
        <h5 class="sub-tit">{{ __('lecture.abs') }}</h5>
        <div>
            <x-forms.select name="type" label="{{ __('lecture.type') }}" :option="config('cm.presentationType')" :attr="['class'=>'form-control']" required></x-forms.select>
            <x-forms.input-long type="text" name="title" label="{{ __('lecture.abs-title') }}" example="ex. Characterization of survival factor in Fusarium solani" required>{{ __('messages.abs-title-msg') }}</x-forms.input-long>
            <div id="author">
                <x-forms.editor id="aff-editor" name="author_affiliation" label="{{ __('lecture.aff') }}" example="ex. <sup>1</sup>Bacteria Research Center, KRIBB, Daejeon 30580, Korea;<sup>2</sup>Department of Applied Biology, Hangang University, Seoul 12335, Korea" required>
                    {!! old('author_affiliation',(isset($expt)?$expt->author_affiliation:null)) !!}
                </x-forms.editor>
                <x-forms.editor id="author-editor" name="author_name" label="{{ __('lecture.name') }}" example="ex. Gil dong Hong<sup>1</sup>,Gil dong Hong<sup>2</sup>,Tom
                                Cruise<sup>2</sup>" required>
                    {!! old('author_name',(isset($expt)?$expt->author_name:null)) !!}
                </x-forms.editor>
            </div>
            <x-forms.editor id="abstract-editor" name="abstract" label="{{ __('lecture.abs') }}" required>
                {!! old('excerpt',(isset($expt)?$expt->excerpt:null)) !!}
            </x-forms.editor>
            <div class="form-group row" id="keywords">
                <div class="col-6">
                    <label class="col-sm-12"><strong>{{ __('lecture.keyword') }}</strong> <span class="ml-2 badge badge-danger">{{ __('Required') }}</span>
                    </label>
                </div>
                <div class="col-6 text-right">
                    <button class="buttons btn btn-primary text-light" role="button" style="margin-right:10px" type="button"
                        @click="addRow">Add</button>
                    <button class="buttons btn btn-danger" role="button" style="margin-right:10px" type="button"
                        @click="delRow">Delete</button>
                </div>
                <div class="d-inline-flex flex-wrap col-sm-12">
                    <div class="col-sm-4 p-1" v-for="keyword in keywords">
                        <input type="text" name="keywords[]" class="form-control" placeholder="Keyword"  v-model="keyword.value">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <hr>
    <section id="presenter">
        <h5 class="sub-tit">{{ __('lecture.pr-info') }}</h5>
        <div>
            <label>{{ __('lecture.pr') }}</label>
            <div class="form-inline d-block">
                <small class="form-text text-muted">ex) Gil dong Hong or Tom Cruise (First name Last name)</small>
                <small class="form-text text-warning">* {{ __('messages.abs-pr-msg') }}</small>
                <div class="d-block">
                    <input class="form-control" type="text" placeholder="{{ __('lecture.pr-name') }}"
                        name="ps_name" value="{!! old('ps_name',(isset($expt->presenter)?$expt->ps_name:null)) !!}"
                        required>
                    <input class="form-control" type="text" placeholder="{{ __('lecture.pr-country') }}" name="ps_country"
                        value="{!! old('ps_country',(isset($expt->presenter)?$expt->ps_country:null)) !!}" required>
                    <input class="form-control" type="text" placeholder="{{ __('lecture.pr-aff') }}"
                        name="ps_affiliation"
                        value="{!! old('ps_affiliation',(isset($expt->presenter)?$expt->ps_affiliation:null)) !!}">
                    <input class="form-control" type="text" placeholder="{{ __('lecture.pr-email') }}" name="ps_email"
                        value="{!! old('ps_email',(isset($expt->presenter)?$expt->ps_email:null)) !!}">
                    <input class="form-control" type="text" placeholder="{{ __('lecture.pr-cellphone') }}"
                        name="ps_cellphone"
                        value="{!! old('ps_cellphone',(isset($expt->presenter)?$expt->ps_cellphone:null)) !!}">
                    <input class="form-control" type="text" placeholder="{{ __('lecture.pr-telephone') }}"
                        name="ps_telephone"
                        value="{!! old('ps_telephone',(isset($expt->presenter)?$expt->ps_telephone:null)) !!}">
                </div>
            </div>
        </div>
    </section>
    <hr>
    <section id="co_authors">
        <h5 class="sub-tit">{{ __('lecture.co-info') }}</h5>
        <div>
            <label>
                <strong>{{ __('lecture.co') }}</strong>
            </label>
            <span class="ml-2 badge badge-danger">{{ __('Required') }}</span>
            <div class="form-inline d-block">
                <small class="form-text text-muted">ex) Gil dong Hong or Tom Cruise (First name Last name)</small>
                <div class="d-block" v-for="co_author in co_authors">
                    <input class="form-control" type="text" placeholder="{{ __('lecture.pr-name') }}"
                        name="co_name[]" v-model="co_author.name" required>
                    <input class="form-control" type="text" placeholder="{{ __('lecture.pr-country') }}"
                        name="co_country[]" v-model="co_author.country" required>
                    <input class="form-control" type="text" placeholder="{{ __('lecture.pr-aff') }}"
                        name="co_affiliation[]" v-model="co_author.affiliation" required>
                    <input class="form-control" type="email" placeholder="{{ __('lecture.pr-email') }}"
                        name="co_email[]" v-model="co_author.email" required>
                    <input class="form-control" type="text" placeholder="{{ __('lecture.pr-cellphone') }}"
                        name="co_cellphone[]" v-model="co_author.cellphone" required>
                    <input class="form-control" type="text" placeholder="{{ __('lecture.pr-telephone') }}"
                        name="co_telephone[]" v-model="co_author.telephone">
                </div>
            </div>
        </div>
        <div class="row align-items-end my-1">
            <div class="col-md-8 text-right">
                <small>※ {!! __('messages.abs-co-msg') !!}</small>
            </div>
            <div class="col-md-4 text-right">
                <button class="buttons btn btn-primary text-light" role="button" type="button"
                    @click="addRow">Add</button>
                <button class="buttons btn btn-danger" role="button" type="button"
                    @click="delRow">Delete</button>
            </div>
        </div>
    </section>
    <hr>

    <section id="fileUpload">
        <h5 class="sub-tit">{{ __('lecture.file.upload') }}</h5>
        <div class="input-group mb-3" v-for="(item, index) in uploadFile" :key="index">
            <input type="file" name=files[] class="custom-file-input" value="@{{ item.file }}" id="customFile" @change="FileChange(index)"  aria-describedby="inputGroupFileAddon01" required>
            <label class="custom-file-label" for="customFile">@{{item.Original}}</label>
            <button class="btn btn-primary mt-3" v-if="item.Tmpname" type="button" @click="FileDown(item)">FileDownLoad</button>

        </div>
        
        <div class="text-right">
            <div id="bar" class="loading-prograss mb-3">
                <div class="spinner-border text-secondary" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
            <button class="buttons btn btn-primary text-light" type="button" @click="addFile">Add</button>
            <button class="buttons btn btn-danger" role="button" type="button" @click="delFile">Delete</button>
        </div>
    </section>
    <input type="hidden" name="abstract_file[]" id="abstract_file">

    <hr>
    <div class="highlight-clean">
        <div class="buttons">
            <button class="btn btn-primary text-light" role="button">{{ __('lecture.submit') }}</button>
            <a class="btn btn-danger text-light" type="button" href="@if(Auth::check()) {{route('lecture.index')}} @else {{url("/")}} @endif">{{ __('lecture.cancel') }}</a>
        </div>
    </div>
    {{ Form::close() }}
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.0"></script>
    <!-- Theme included stylesheets -->
    <script src="https://cdn.quilljs.com/1.3.5/quill.js"></script>
    <!-- Initialize Quill editor -->
    {{-- <script src="https://unpkg.com/axios/dist/axios.min.js"></script> --}}
    {{-- axios Import --}}


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>

    <script>
        var toolbarOptions = ['bold','italic',{ 'script': 'sub'}, { 'script': 'super' },'underline','omega'];
            // var title_quill = new Quill('#title-editor', {modules: {toolbar: toolbarOptions},theme: 'snow',placeholder: '50단어 내외로 작성바랍니다. 특수문자는 제거됩니다.(limited 50 words. All special chars will remove)'});
            var abstract_quill = new Quill('#abstract-editor', {modules: {toolbar: toolbarOptions},theme: 'snow',placeholder: 'Special lecture, Plenary lecture, Concurrent Session: ~750 words\nPoster session: ~250 words'});
            var author_quill = new Quill('#author-editor', {modules: {toolbar: [{'script':'super'}]},theme: 'snow',placeholder: '{{ __('messages.abs-author-msg') }}'});
            var aff_quill = new Quill('#aff-editor', {modules: {toolbar: [{'script':'super'}]},theme: 'snow',placeholder: '{{ __('messages.abs-aff-msg') }}'});
            var form = document.querySelector('form');
            form.onsubmit = function() {
                // Populate hidden form on submit
            //   var title_val = document.querySelector('input[name=title]');
                var abstract_val = document.querySelector('input[name=abstract]');
                var author_name_val = document.querySelector('input[name=author_name]');
                var author_affiliation_val = document.querySelector('input[name=author_affiliation]');
            //   title_val.value = quillGetHTML(title_quill.getContents());
                abstract_val.value = quillGetHTML(abstract_quill.getContents());
                author_name_val.value = quillGetHTML(author_quill.getContents());
                author_affiliation_val.value = quillGetHTML(aff_quill.getContents());
                // debug
                // console.log("Submitted", $(form).serialize(), $(form).serializeArray());
                // // No back end to actually submit to!
                // alert('Open the console to see the submit data!')
                // return false;
            };
    </script>
    <script>
        function quillGetHTML(inputDelta)
        {
            var tempCont = document.createElement("div");
            (new Quill(tempCont)).setContents(inputDelta);
            return tempCont.getElementsByClassName("ql-editor")[0].innerHTML;
        }
    </script>
    <script>
        $(function(){
            $("#bar").hide();
            abs_array = [];
        })
        new Vue({
                el: '#keywords',
                data: {keywords:
                    @if(isset($expt->keywords)) {!!$expt->keywords!!}
                    @else [{}],
                    @endif
                },
                methods: {
                    addRow: function() {
                        this.keywords.push({value:''});
                    },
                    delRow: function() {
                        if(this.keywords.length!=1) this.keywords.pop();
                    },
                }
            });
        new Vue({
                el: '#co_authors',
                data: {co_authors:
                    @if(isset($expt->co_authors)) {!! $expt->co_authors !!}
                    @else [{}],
                    @endif
                },
                methods: {
                    addRow: function() {
                        this.co_authors.push({});
                    },
                    delRow: function() {
                        if(this.co_authors.length!=1) this.co_authors.pop();
                    },
                }
            });
        var fileChange = new Vue({
                el: "#fileUpload",
                data:{
                    uploadFile:[{
                        Original:'Choose File...',
                        Tmpname:'',
                        Ext:''
                    }],
                },
                methods: {
                    FileChange(index){   
                        const file = event.target.files[0];
                        const name = file.name;
                        var bar = $("#bar");
                    

                        var formData = new FormData();
                        formData.append("file",file);

                       
                        $(document).ajaxStart(function(){
                            bar.show();
                        });
                        $(document).ajaxStop(function(){
                            bar.hide();
                        });

                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            type: "POST",
                            processData: false,
                            contentType: false,
                            enctype: 'multipart/form-data',
                            url: "{{ route('fileupload') }}",
                            data: formData,
                            success(res){
                                for(i=0; i<5; i++){
                                    if(index == i){
                                        abs_array[i] = res
                                        alert('파일 임시 저장 완료');
                                    }
                                }
                                fileChange.uploadFile[index].Original = res.Original;
                                fileChange.uploadFile[index].Tmpname = res.Tmpname;
                                fileChange.uploadFile[index].Ext = res.Ext;
                                $("#abstract_file").val(JSON.stringify(abs_array));
                            },
                            error(res){
                                const print = JSON.stringify(res.responseJSON.Message);
                                alert(print)
                            },
                        })
                    },
                    addFile(){
                        if(this.uploadFile.length == 5){
                            alert("Max 5File");
                            return false;
                        }else{
                            if(abs_array.length == 0){
                                alert('파일을 추가해주시고 Add 버튼을 눌러주시기 바랍니다.');
                                return false;
                            }else if(abs_array.length == this.uploadFile.length){
                                this.uploadFile.push(
                                    {
                                        Original: 'Choose File',
                                        Tmpname:'',
                                        Ext:''
                                    }
                                )
                            }else{
                                alert('파일을 추가해주시고 Add 버튼을 눌러주시기 바랍니다.');
                                return false
                            }
                        }
                    },
                    delFile(){
                        if(this.uploadFile.length == 1){
                            return false;
                        }else if(this.uploadFile.length == abs_array.length){
                            this.uploadFile.pop();
                            abs_array.pop();
                            $("#abstract_file").val(JSON.stringify(abs_array));
                        }else{
                            this.uploadFile.pop();
                        }
                    },
                    FileDown(data){
                        document.location.href="{{ url('filedown') }}"+'/'+data.Original+'/'+data.Tmpname
                    },
                     
                }
            });
    </script>
 
  
    @push('styles')
    <link href="https://cdn.quilljs.com/1.3.5/quill.snow.css" rel="stylesheet">
    @endpush
@endsection
