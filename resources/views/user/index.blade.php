@extends('layouts.main')
@include('user.modal')
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
            <h1>User</h1>
            {{-- <div class="">
                @can('add user')
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahpengguna"><i
                            class="fa-solid fa-plus"></i> Add User</button>
                @else
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#" disabled><i
                            class="fa-solid fa-plus"></i> Add User</button>
                @endcan
            </div>
            <div class="table   mt-4">
                <table class="table  rounded ">
                    <thead class="">
                        <tr>
                            <th class="col-1 ps-4 rounded-start text-white " style="background-color: rgb(68, 175, 110);">No
                            </th>
                            <th class="col-3 text-white " style="background-color: rgb(68, 175, 110);">
                                Username</th>
                            <th class="col-3 text-white text-center" style="background-color: rgb(68, 175, 110);">Email
                            </th>
                            <th class="col-2 text-center text-white " style="background-color: rgb(68, 175, 110);">
                                Role</th>
                            <th class="col-2 text-center text-white rounded-end"
                                style="background-color: rgb(68, 175, 110);">
                                Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $item)
                            <tr class="py-2" style="padding-top:10px !important;padding-bottom: 10px; !important ">
                                <td class="ps-4" style="">
                                    {{ $loop->iteration }}</td>
                                <td style=" ">
                                    {{ $item->name }}</td>
                                <td style="  ">
                                    {{ $item->email }}</td>
                                <td class="text-center" style=" ">
                                    @foreach ($item->roles as $role)
                                        {{ $role->name }}
                                    @endforeach
                                </td>
                                <td class="text-center ">
                                    <div class="d-flex align-items-center justify-content-center gap-2">
                                        @can('update user')
                                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#editUserModal{{ $item->id }}">
                                                Edit
                                            </button>
                                        @else
                                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                disabled>
                                                Edit
                                            </button>
                                        @endcan
                                        @can('delete user')
                                            <form action="{{ route('user.destroy', $item->id) }}" class="m-0" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('hapus user ?')">Delete</button>
                                            </form>
                                        @else
                                            <button type="button" class="btn btn-danger btn-sm"
                                                onclick="return confirm('hapus user ?')" disabled>Delete</button>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div> --}}

        </div>
    @endsection
