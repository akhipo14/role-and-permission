<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/button.css') }}">
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>

<body>
    <div class="container " style="margin-top:25vh;">
        <div class="card mx-auto w-50">
            <div class="w-100  bg-success rounded mb-3 pt-3 pb-3">
                <h1 class="text-center text-white">Login</h1>
                <p class="text-center text-white">Input your email and password please :) </p>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label for="email"><strong>Email</strong></label>
                    <input type="email" name="email" id="email" class="form-control" required
                        placeholder="alo@gmail.com">
                </div>
                <div class="form-group mb-3">
                    <label for="password"><strong>Password</strong></label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
        </div>
    </div>
</body>

</html>
