<div class="">
    <nav class="navbar navbar-expand-md custom-header">
        <a class="navbar-brand text-light" href="#">
            <i class="icon ion-ios-settings-strong"></i> {!! config('cm.title') !!} 학술대회 <strong>관리자</strong>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="text-light">
                <i class="icon ion-grid"></i>
            </span>
        </button>
        @if(Auth::check())
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto ">
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{ route('admin.submit.list') }}">사전등록</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{ route('admin.lecture.list') }}">초록등록</a>
                    </li>
                     {{-- 
                    <li class="nav-item">
                        <a class="nav-link" href="#"></a>
                    </li> --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            설정
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            {{-- <a class="dropdown-item" href="#">행사설정</a>
                            <a class="dropdown-item" href="#">세부설정</a> --}}
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('admin.logout')}}">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        @endif
    </nav>
</div>
