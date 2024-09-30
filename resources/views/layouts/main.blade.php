<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Roles and Permissions</title>
    <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/button.css') }}">
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>

<body>
    <div class="wrapper  ">
        @include('layouts.sidebar')
        <div class="main ">
            @include('layouts.navbar')
            {{-- content --}}
            <div class="content ">
                <div class="content2">

                </div>
                <div style="">
                    @yield('content')
                </div>
            </div>
            {{-- end-content --}}
        </div>
    </div>

</body>

</html>
