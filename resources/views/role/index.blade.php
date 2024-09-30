@extends('layouts.main')
@include('role.modal')
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
            <h1>Roles</h1>
            <div class="">
                @can('add role')
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahrole"><i
                            class="fa-solid fa-plus"></i> Add Role</button>
                @else
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="##" disabled><i
                            class="fa-solid fa-plus"></i> Add Role</button>
                @endcan
            </div>
            <div class="table   mt-4">
                <table class="table  rounded ">
                    <thead class="">
                        <tr>
                            <th class="col-1 ps-4 rounded-start text-white " style="background-color: rgb(68, 175, 110);">No
                            </th>
                            <th class="col-3 text-white " style="background-color: rgb(68, 175, 110);">
                                Role Name</th>
                            <th class="col-2 text-center text-white rounded-end"
                                style="background-color: rgb(68, 175, 110);">
                                Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $item)
                            <tr class="py-2" style="padding-top:10px !important;padding-bottom: 10px; !important ">
                                <td class="ps-4" style="">
                                    {{ $loop->iteration }}</td>
                                <td style=" ">
                                    {{ $item->name }}</td>

                                <td class="text-center">
                                    <div class="d-flex gap-2 justify-content-center">
                                        @can('update permission to role')
                                            <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#updatePermissionRole{{ $item->id }}">
                                                Update Permission
                                            </button>
                                        @else
                                            <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#" disabled>
                                                Update Permission
                                            </button>
                                        @endcan
                                        @can('update role')
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#editRoleModal{{ $item->id }}">
                                                Edit
                                            </button>
                                        @else
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#" disabled>
                                                Edit
                                            </button>
                                        @endcan
                                        @can('delete role')
                                            <form action="{{ route('role.destroy', $item->id) }}" method="post" class="m-0">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Delete role?')">
                                                    Delete
                                                </button>
                                            </form>
                                        @else
                                            <button type="button" class="btn btn-danger"
                                                onclick="return confirm('Delete role?')" disabled>
                                                Delete
                                            </button>
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
