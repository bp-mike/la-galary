<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.6.3/css/foundation.min.css" integrity="sha512-dMUQinc1gbNb95AFtKtP4q/g56T8r9oDxlWy0hrHyzfUbMq/vQztAqaR/FDY/bY0R1Ikc30aq94jyQH2Ix++ug==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
    <title>@yield('title')</title>
</head>
<body>
    @include('inc.topbar')

    <div class="row">@yield('content')</div>

    <footer id="footer" class="text-center">
        <p> copyright 2021 &copy; lpg</p>
    </footer>
    
</body>
</html>