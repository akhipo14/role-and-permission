@extends('layouts.main')
@include('post.modal')
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
        <div class="card">
            <h1>All Post Article</h1>

            <div class="table   mt-4">
                <table class="table  rounded ">
                    <thead class="">
                        <tr>
                            <th class="col-1 ps-4 rounded-start text-white " style="background-color: rgb(68, 175, 110);">No
                            </th>
                            <th class="col-3 text-white " style="background-color: rgb(68, 175, 110);">
                                Title</th>
                            <th class="col-3 text-white " style="background-color: rgb(68, 175, 110);">
                                Description</th>
                            <th class="col-2 text-center text-white rounded-end"
                                style="background-color: rgb(68, 175, 110);">
                                Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $item)
                            <tr class="py-2" style="padding-top:10px !important;padding-bottom: 10px; !important ">
                                <td class="ps-4" style="">
                                    {{ $loop->iteration }}</td>
                                <td style=" ">
                                    {{ $item->title }}</td>
                                <td style=" ">
                                    {{ Str::limit($item->desc, 19, '...') }}
                                    {{-- <img src="{{ asset('storage/post/' . $item->image) }}" alt=""
                                        style="width: 75px"> --}}
                                </td>

                                <td class="text-center ">
                                    <div class="d-flex gap-2 justify-content-center">
                                        <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#viewPostModal{{ $item->id }}">
                                            View
                                        </button>

                                        @can('delete post')
                                            <form action="{{ route('post.destroy', $item->id) }}" class="m-0" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Delete Post ?')">Delete</button>
                                            </form>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
