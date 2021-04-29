@extends('user.layout')

@section("konten")

<div class="container">
    
    <div class="card shadow-sm mt-5">
        <div class="card-header text-center">
            <h3>Data Literasi Guru</h3>            
        </div>
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
                        <th scope="col">NIP</th>
                        <th scope="col">Nama Guru</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Jenis Buku</th>
                        <th scope="col">Judul Buku</th>
                        <th scope="col"></th>                        
                    </tr>
                </thead>
                <tbody>
                @foreach ($data as $data)
                    <tr>
                        <td>{{$data->NIP}}</td>
                        <td>{{$data->nama}}</td>                        
                        <td>{{$data->jabatan}}</td>
                        <td>{{$data->jenis_buku}}</td>
                        <td>{{$data->judul_buku}}</td>
                        
                        <td>
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#edit{{$data->id}}"><i class="fas fa-edit"></i></button>
                            <a class="btn btn-danger btn-sm" href="literasi_hapus/{{$data->id}}" role="button"><i class="far fa-trash-alt"></i></a>
                        
                        </td>
                    </tr>
                    <!-- Modal edit-->
                    <div class="modal fade" id="edit{{$data->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Edit</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="edit_literasi/{{$data->id}}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="nip" class="form-label">NIP</label>
                                    <input type="text" class="form-control" name="nip" id="nip" placeholder="Jawaban anda" required value="{{$data->NIP}}">
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Jawaban anda" required value="{{$data->nama}}">
                                </div>
                                <div class="mb-3">
                                    <label for="jenisKelamin" class="form-label">Jenis Kelamin</label>
                                    <input type="text" class="form-control" name="jenis_kelamin" id="jenisKelamin" placeholder="Jawaban anda" required value="{{$data->jenis_kelamin}}">
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Jawaban anda" required value="{{$data->alamat}}">
                                </div>
                                <div class="mb-3">
                                    <label for="jabatan" class="form-label">Jabatan</label>
                                    <input type="text" class="form-control" name="jabatan" id="jabatan" placeholder="Jawaban anda" required value="{{$data->jabatan}}">
                                </div>
                                <div class="mb-3">
                                    <label for="jenisBuku" class="form-label">Jenis Buku</label>
                                    <input type="text" class="form-control" name="jenis_buku" id="jenisBuku" placeholder="Jawaban anda" required value="{{$data->jenis_buku}}">
                                </div>
                                <div class="mb-3">
                                    <label for="judulbuku" class="form-label">Judul Buku</label>
                                    <input type="text" class="form-control" name="judul_buku" id="judulbuku" placeholder="Jawaban anda" required value="{{$data->judul_buku}}">
                                </div>
                                <div class="mb-3">
                                    <label for="tlp" class="form-label">No. Telp/HP</label>
                                    <input type="number" class="form-control" name="tlp" id="tlp" placeholder="Jawaban anda" required value="{{$data->tlp}}">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                            </div>
                            </form>
                        </div>
                    </div>

                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
</div>



<!-- Modal add-->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Tambah Literasi</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="add_literasi" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label for="nip" class="form-label">NIP</label>
                <input type="text" class="form-control" name="nip" id="nip" placeholder="Jawaban anda" required>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Jawaban anda" required>
            </div>
            <div class="mb-3">
                <label for="jenisKelamin" class="form-label">Jenis Kelamin</label>
                <input type="text" class="form-control" name="jenis_kelamin" id="jenisKelamin" placeholder="Jawaban anda" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Jawaban anda" required>
            </div>
            <div class="mb-3">
                <label for="jabatan" class="form-label">Jabatan</label>
                <input type="text" class="form-control" name="jabatan" id="jabatan" placeholder="Jawaban anda" required>
            </div>
            <div class="mb-3">
                <label for="jenisBuku" class="form-label">Jenis Buku</label>
                <input type="text" class="form-control" name="jenis_buku" id="jenisBuku" placeholder="Jawaban anda" required>
            </div>
            <div class="mb-3">
                <label for="judulbuku" class="form-label">Judul Buku</label>
                <input type="text" class="form-control" name="judul_buku" id="judulbuku" placeholder="Jawaban anda" required>
            </div>
            <div class="mb-3">
                <label for="judulbuku" class="form-label">Upload Buku</label>
                <input class="form-control shadow" type="file" name="file" id="file" autofocus />
            </div>
            <div class="mb-3">
                <label for="tlp" class="form-label">No. Telp/HP</label>
                <input type="text" class="form-control" name="tlp" id="tlp" placeholder="Jawaban anda" required>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Simpan</button>
        </div>
        </div>
        </form>
    </div>
</div>



@endsection

@section("js")
<script>
    $(document).ready(function() {
            $('.datatable').DataTable({
            "order": [[ 0, "desc" ]]
        });
    } );
</script>
@endsection