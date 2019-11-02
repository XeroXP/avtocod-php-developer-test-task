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
            <ul class="nav navbar-nav">
                <li {{ Route::currentRouteName()=='auth.showRegisterForm' ? 'class=active' : '' }}>
                    <a href="{{route('auth.showRegisterForm')}}">Регистрация</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
