<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Sustainability</title>
    <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/button.css') }}">
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>

<body>
    @include('layouts.navbar')
    <div class="container mt-4">
        <div class="row gap-2">
            @if ($posts->count() > 0)
                @foreach ($posts as $item)
                    <div class="col-md-3 align-items-center">
                        <div class="card">
                            <img src="{{ asset('storage/post/' . $item->image) }}" class=" mb-2 img-fluid rounded-top"
                                alt="" />
                            <h5>{{ $item->title }}</h5>
                            <p>{{ Str::limit($item->desc, 50, '...') }}</p>
                            <div class="d-flex   justify-content-end ">
                                <p class="my-0">Author : {{ $item->user->name }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="d-flex">
                    <h2 class="mx-auto">data is not available</h2>
                </div>
            @endif
        </div>
    </div>

</body>

</html>
