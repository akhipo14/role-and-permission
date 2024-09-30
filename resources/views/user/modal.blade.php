<div class="modal fade" id="tambahpengguna" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('user.store') }}" method="post">
                @csrf
                @method('post')
                <div class="modal-body">

                    <div class="d-flex align-items-center mb-2">
                        <div class="col-md-4">
                            <label class=" text-nowrap me-3"><strong>Username</strong></label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class=" form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="d-flex align-items-center  mb-2">
                        <div class="col-md-4">
                            <label class=" text-nowrap me-3"><strong>Email</strong></label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class=" form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="d-flex align-items-center  mb-2">
                        <div class="col-md-4">
                            <label class=" text-nowrap me-3"><strong>Password</strong></label>
                        </div>
                        <div class="col-md-8">
                            <input type="password" class=" form-control" name="password" value="">
                        </div>
                    </div>
                    <div class="d-flex align-items-center  mb-2">
                        <div class="col-md-4">
                            <label class=" text-nowrap me-3"><strong>Role</strong></label>
                        </div>
                        <div class="col-md-8">
                            <select name="role" class="form-control @error('role') is-invalid @enderror"
                                id="">
                                <option value="">Select Role</option>
                                @foreach ($roles as $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('role')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>

        </div>
    </div>
</div>
@foreach ($users as $item)
    <div class="modal fade" id="editUserModal{{ $item->id }}" tabindex="-1" aria-labelledby="editUserLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserLabel">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('user.update', $item->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="userName" class="col-form-label">Nama User:</label>
                            <input type="text" class="form-control" name="name" value="{{ $item->name }}">
                        </div>
                        <div class="mb-3">
                            <label for="userEmail" class="col-form-label">Email:</label>
                            <input type="email" class="form-control" name="email" value="{{ $item->email }}">
                        </div>
                        <div class="mb-3">
                            <label for="userEmail" class="col-form-label">Password:</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="mb-3">
                            <label for="userRole" class="col-form-label">Role:</label>
                            <select name="role" class="form-control">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}"
                                        {{ $item->roles->first() && $role->name === $item->roles->first()->name ? 'selected' : '' }}>
                                        {{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
