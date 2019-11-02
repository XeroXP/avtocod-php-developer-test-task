<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    @include('layouts.partials.html_header')
</head>

<body>

@include('layouts.partials.main_header')

<div class="container">
    @yield('main_content')
</div>

@section('scripts')
    @include('layouts.partials.scripts')
@show

</body>
</html>
