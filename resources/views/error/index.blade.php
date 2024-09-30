<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>

<body style="background-color: rgb(218, 221, 231) !important;">
    <div class="container d-flex">
        <h2 class="mx-auto mt-5">{{ $exception }}</h2>
        {{-- <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form> --}}
    </div>
</body>

</html>
