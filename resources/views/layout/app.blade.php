<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - AHADU MARKET</title>
    <link rel="stylesheet" href="{{ asset('/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic&amp;display=swap">
    <link rel="stylesheet" href="{{ asset('/fonts/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/baguetteBox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/Signup-page-with-overlay.css') }}">

    {{-- <script src='register.js'> --}}
        

    </script> 
</head>

<body id="page-top" data-bs-spy="scroll" data-bs-target="#mainNav" data-bs-offset="57">
    @include('layout.partials.nav')

    @yield('content')
    
</body>

</html>