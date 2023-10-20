
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ogani | @yield('title')</title>
    @include('frontend.includes.style')
</head>

<body>
@include('frontend.includes.header')

@yield('body')
@include('frontend.includes.footer')

@include('frontend.includes.script')



</body>

</html>
