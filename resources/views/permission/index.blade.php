@extends('layouts.main')
@include('permission.modal')
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
            <h1>Permissions</h1>
            <div class="">
                @can('add permission')
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahpermission"><i
                            class="fa-solid fa-plus"></i> Add Permission</button>
                @else
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#" disabled><i
                            class="fa-solid fa-plus"></i> Add Permission</button>
                @endcan

            </div>
            <div class="table   mt-4">
                <table class="table  rounded ">
                    <thead class="">
                        <tr>
                            <th class="col-1 ps-4 rounded-start text-white " style="background-color: rgb(68, 175, 110);">No
                            </th>
                            <th class="col-3 text-white " style="background-color: rgb(68, 175, 110);">
                                Name Permission</th>
                            <th class="col-2 text-center text-white rounded-end"
                                style="background-color: rgb(68, 175, 110);">
                                Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $item)
                            <tr class="py-2" style="padding-top:10px !important;padding-bottom: 10px; !important ">
                                <td class="ps-4" style="">
                                    {{ $loop->iteration }}</td>
                                <td style=" ">
                                    {{ $item->name }}</td>

                                <td class="text-center ">
                                    <div class="d-flex gap-2 justify-content-center">
                                        @can('update permission')
                                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#editpermissionModal{{ $item->id }}">
                                                Edit
                                            </button>
                                        @else
                                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#" disabled>
                                                Edit
                                            </button>
                                        @endcan
                                        @can('delete permission')
                                            <form action="{{ route('permission.destroy', $item->id) }}" class="m-0"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Delete Permission ?')">Delete</button>
                                            </form>
                                        @else
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Delete Permission ?')" disabled>Delete</button>
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
