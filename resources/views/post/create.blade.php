@extends('layouts.main')
@section('content')
    <div class="body-content  pt-2 ">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="card m-2">
            <h1>Add Post Article</h1>
            <div class="">
                <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-2">
                        <div class="col-md-8  ">
                            <label for=""><span>Title</span></label>
                            <input type="text" class="form-control mb-1 @error('desc')is-invalid @enderror"
                                value="{{ old('title') }}" name="title">
                            <div class=" mb-2"></div>
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <label for=""><span>Description</span></label>
                            <textarea name="desc" class="form-control @error('desc')is-invalid @enderror" id="" cols="30"
                                rows="10">{{ old('desc') }}</textarea>
                            @error('desc')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-4  border mt-4 rounded">
                            <img src="{{ asset('/assets/img/images.png') }}" class="img-preview" alt="">
                            <input class="form-control mt-3 mb-2  @error('image')is-invalid @enderror" type="file"
                                accept="image/*" id="post_image" name="image" onchange="previewImage()">
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button class="btn btn-primary" type="submit">Add Post</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <script type="text/javascript">
        function previewImage() {
            const image = document.querySelector('#post_image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
