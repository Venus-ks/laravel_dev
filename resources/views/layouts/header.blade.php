<header>
    <div class="jumbotron">
        <div class="d-md-flex justify-content-center">
            <h3 class="conference-host">{{ config('cm.host1') }} <span class="mx-1">and</span> {{ config('cm.host2') }}</h3>
        </div>        
        <div class="my-4">
            <h2 class="conference-title">{{ config('cm.title') }}</h2>
            <a href="/"><h1 class="conference-subtitle">{{ config('cm.subtitle') }}</h1></a>
        </div>        
        <div class="d-md-flex justify-content-center">
            <p class="conference-data">{{ config('cm.term') }}</p>
            <p class="conference-data">{{ config('cm.address') }}</p>
        </div>
    </div>
</header>

<nav class="navbar navbar-light navbar-expand-md navigation-clean py-2">
    <div class="container">
        <a class="navbar-brand" href="/">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door mr-2" viewBox="0 0 16 16"><path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z"/></svg>
            <span class="d-none">{{ config('cm.title') }}</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/></svg>
        </button>
        <div class="collapse navbar-collapse flex-grow-0" id="collapsibleNavId">
            <ul class="navbar-nav">
                @empty(!config('menu.static'))
                    @foreach(config('menu.static.sub') as $sub)
                        <li class="nav-item dropdown">
                            <a class="nav-link @if(Route::currentRouteName()==$sub) active @else text-light @endif" href="{{ route($sub) }}">{{ __($sub) }}</a>
                        </li>
                    @endforeach
                @endempty
                {{-- @empty(!config('menu.static'))
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light" href="" id="applyDropdown" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">{{ __(config('menu.static.title')) }}</a>
                    <div class="dropdown-menu" aria-labelledby="applyDropdown">
                        @foreach(config('menu.static.sub') as $sub)
                        <a class="dropdown-item @if(Route::currentRouteName()==$sub) active @else text-light @endif"
                            href="{{ route($sub) }}">{{ __($sub) }}</a>
                        @endforeach
                    </div>
                </li>
                @endempty --}}
                @empty(!config('menu.submit'))
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light" href="" id="applyDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __(config('menu.submit.title')) }}</a>
                    <div class="dropdown-menu" aria-labelledby="applyDropdown">
                        @foreach(config('menu.submit.sub') as $sub)
                        <a class="dropdown-item @if(Route::currentRouteName()==$sub) active @else text-light @endif" href="{{ route($sub) }}">{{ __($sub) }}</a>
                        @endforeach
                    </div>
                </li>
                @endempty
                @empty(!config('menu.lecture'))
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light" href="" id="abstractDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __(config('menu.lecture.title')) }}</a>
                    <div class="dropdown-menu" aria-labelledby="abstractDropdown">
                        @foreach(config('menu.lecture.sub') as $sub)
                        <a class="dropdown-item @if(Route::currentRouteName()==$sub) active @else text-light @endif" href="{{ route($sub) }}">{{ __($sub) }}</a>
                        @endforeach
                    </div>
                </li>
                @endempty
            </ul>
        </div>
    </div>
</nav>