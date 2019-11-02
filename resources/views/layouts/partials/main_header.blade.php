{{-- Main header --}}
<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{route('index')}}">Стена сообщений</a>
        </div>
        <ul class="nav navbar-nav">
            <li{{ Route::currentRouteName()=='index' ? ' class=active' : '' }}>
                <a href="{{route('index')}}">Главная</a>
            </li>
        </ul>
        <div class="navbar-right">
            @if(!Auth::check())
                <ul class="nav navbar-nav">
                    <li {{ Route::currentRouteName()=='auth.showLoginForm' ? 'class=active' : '' }}>
                        <a href="{{route('auth.showLoginForm')}}">Авторизация</a>
                    </li>
                    <li {{ Route::currentRouteName()=='auth.showRegisterForm' ? 'class=active' : '' }}>
                        <a href="{{route('auth.showRegisterForm')}}">Регистрация</a>
                    </li>
                </ul>
            @else
                <p class="navbar-text"><span class="glyphicon glyphicon-user"></span> {{Auth::user()->name}}</p>
                <ul class="nav navbar-nav">
                    <li><a href="{{route('auth.logout')}}"><span class="glyphicon glyphicon-log-out"></span> Выход</a></li>
                </ul>
            @endif
        </div>
    </div>
</nav>
