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
                <form action="{{ route('post.update', $post->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row g-2">
                        <div class="col-md-8  ">
                            <label for=""><span>Title</span></label>
                            <input type="text" class="form-control mb-3" name="title" value="{{ $post->title }}">
                            <label for=""><span>Description</span></label>
                            <textarea name="desc" class="form-control" id="" cols="30" rows="10">{{ $post->desc }}</textarea>
                        </div>
                        <div class="col-md-4  border">
                            <div class="cover-gambar-produk">
                                <img src="{{ asset('storage/post/' . $post->image) }}" class="img-preview" alt="">
                            </div>
                            <input class="form-control mt-3  @error('image')is-invalid @enderror" type="file"
                                accept="image/*" id="post_image" name="image" onchange="previewImage()">
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button class="btn btn-primary" type="submit">Save Post</button>
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
