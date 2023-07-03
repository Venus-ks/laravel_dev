<div class="col-3 d-none pl-0 depth">  <!-- 서브메뉴 호출시 d-lg-block 추가 -->
    <h4>{{ __($title) }}</h4>
    <ul class="nav">
        @foreach($sub as $item)
        <li class="nav-item border-bottom">
            <a class="nav-link @if(Route::currentRouteName()==$item) active @endif" href="{{ route($item) }}">{{ __($item) }}</a>
        </li>
        @endforeach
    </ul>
</div>
