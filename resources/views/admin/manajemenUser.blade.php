@extends('admin.layout')

@section("konten")

<div class="container">
    <div class="mt-5 text-center">
        <h3>Manajemen User</h3>
    </div>
    <div class="card shadow-sm mt-5">
        <!-- <div class="mt-3 text-center">
            <h5>Menunggu Konfirmasi</h5>
        </div> -->
        <div class="card-body table-responsive">
            <div class="float-end mb-3 mt-2">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-light text-primary rounded-pill border-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    <i class="far fa-plus-circle"></i>
                    Tambah
                </button>
            </div>
            <table class="table datatable table-hover">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Username</th>
                        <th scope="col">Level</th>
                        <th scope="col"></th>                        
                    </tr>
                </thead>
                <tbody>
                @foreach ($user as $index =>$data)
                    <tr>
                        <td>{{$index+1}}</td>
                        <td>{{$data->username}}</td>
                        <td>
                            @php
                                    $level = $data->is_admin;

                                    switch ($level) {
                                    case "0":
                                        echo "User";
                                        break;
                                    case "1":
                                        echo "Admin";
                                        break;
                                    }
                            @endphp
                        </td>
                            
                        <td>
                            <div class="row">
                                <a class="col btn btn-primary btn-sm" href="#edit{{$data->id}}" data-bs-toggle="modal" role="button">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a class="col btn btn-danger btn-sm" href="hapus_user/{{$data->id}}" role="button">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


<!-- Modal Add-->
<form action="add_user" method="post">
@csrf
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" id="username" aria-describedby="usernameHelp" required>
                    <label for="username" class="form-label mt-3">Level</label>
                    <select name="level" class="form-select" aria-label="Default select example" required>
                        <option selected value="">Pilih</option>
                        <option value="1">Admin</option>
                        <option value="0">User</option>
                    </select>
                    <div id="usernameHelp" class="form-text">Default password sama dengan username.</div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
            </div>
        </div>
    </div>
</form>

<!-- Modal edit -->
@foreach ($user as $data)
<form action="edit_user/{{$data->id}}" method="post">
@csrf
    <div class="modal fade" id="edit{{$data->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" id="username" value="{{$data->username}}" aria-describedby="usernameHelp" required>
                    <label for="username" class="form-label mt-3">Level</label>
                    <select name="level" class="form-select" aria-label="Default select example" required>
                        <option value="">Pilih</option>
                        <option  <?php if($data->is_admin =="1") echo 'selected="selected"'; ?> value="1">Admin</option>
                        <option <?php if($data->is_admin=="0") echo 'selected="selected"'; ?> value="0">User</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary"  data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#edit_password{{$data->id}}">Edit Password</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
            </div>
        </div>
    </div>
</form>
@endforeach

<!-- Modal edit password-->
@foreach ($user as $data)
<form action="edit_password/{{$data->id}}" method="post">
@csrf
    <div class="modal fade" id="edit_password{{$data->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" id="username" aria-describedby="usernameHelp" value="{{$data->username}}" disabled >
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Pssword baru</label>
                    <input type="password" name="password" class="form-control" id="username" aria-describedby="usernameHelp" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#edit{{$data->id}}">Kembali</button>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
            </div>
        </div>
    </div>
</form>
@endforeach
@endsection

@section("js")


<script>
    $(document).ready(function() {
            $('.datatable').DataTable({
            
        });
    } );
</script>
@endsection