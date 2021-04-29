@extends('admin.layout')

@section("konten")

<div class="container">
    <div class="mt-5 text-center">
        <h2>Daftar Lembaga</h2>
    </div>
    <div class="card shadow-sm mt-5">
        <div class="card-body table-responsive">
            <table class="table datatable table-hover">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">NPSN</th>
                        <th scope="col">Nama Lembaga</th>
                        <th scope="col">Akreditasi</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">No. Telpon</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($dataLembaga as $data)
                    <tr>
                        <td>{{$data->NPSN}}</td>
                        <td>{{$data->nama_lembaga}}</td>
                        <td>{{$data->akreditasi}}</td>
                        <td>{{$data->alamat}}</td>
                        <td>{{$data->tlp}}</td>
                        <td>
                            <div class="row">
                                <a class="col btn btn-primary btn-sm" href="#edit{{$data->id}}" data-bs-toggle="modal" role="button">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a class="col btn btn-danger btn-sm" href="daftarLembaga_hapus/{{$data->id}}" role="button">
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
    
    
</div>

<!-- Modal Add-->
@foreach ($dataLembaga as $data)
<form action="daftarLembaga_edit/{{$data->id}}" method="post">
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
                    <label for="nip" class="form-label">Nama Lembaga</label>
                    <input type="text" class="form-control" name="nama_lembaga" id="nip" placeholder="Jawaban anda" required value="{{$data->nama_lembaga}}">
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Jumlah Guru</label>
                    <div class="row">
                        <div class="col">
                            Laki-Laki
                            <input type="text" class="form-control" name="jumlah_guru_lk" id="nama" placeholder="Jawaban anda" required value="{{$data->jumlah_guru_lk}}">
                        </div>
                        <div class="col">
                            Perempuan
                            <input type="text" class="form-control" name="jumlah_guru_pr" id="nama" placeholder="Jawaban anda" required value="{{$data->jumlah_guru_pr}}">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="jenisKelamin" class="form-label">Jumlah Murid</label>
                    <div class="row">
                        <div class="col">
                            Laki-Laki
                            <input type="text" class="form-control" name="jumlah_murid_lk" id="jenisKelamin" placeholder="Jawaban anda" required value="{{$data->jumlah_murid_lk}}">
                        </div>
                        <div class="col">
                            Perempuan
                            <input type="text" class="form-control" name="jumlah_murid_pr" id="jenisKelamin" placeholder="Jawaban anda" required value="{{$data->jumlah_murid_pr}}">
                        </div>
                    </div>                                    
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Status Akreditasi</label>
                    <input type="text" class="form-control" name="akreditasi" id="alamat" placeholder="Jawaban anda" required value="{{$data->akreditasi}}">
                </div>
                <div class="mb-3">
                    <label for="jabatan" class="form-label">Alamat</label>
                    <input type="text" class="form-control" name="alamat" id="jabatan" placeholder="Jawaban anda" required value="{{$data->alamat}}">
                </div>
                <div class="mb-3">
                    <label for="jenisBuku" class="form-label">No. Izin Pendirian</label>
                    <input type="text" class="form-control" name="no_izin_pendirian" id="jenisBuku" placeholder="Jawaban anda" required value="{{$data->no_izin_pendirian}}">
                </div>
                <div class="mb-3">
                    <label for="judulbuku" class="form-label">Tahun Pendirian</label>
                    <input type="text" class="form-control" name="tahun_pendirian" id="judulbuku" placeholder="Jawaban anda" required value="{{$data->tahun_pendirian}}">
                </div>
                <div class="mb-3">
                    <label for="tlp" class="form-label">NPSN</label>
                    <input type="text" class="form-control" name="NPSN" id="tlp" placeholder="Jawaban anda" required value="{{$data->NPSN}}">
                </div>
                <div class="mb-3">
                    <label for="tlp" class="form-label">No. SK Kemenkumham</label>
                    <input type="text" class="form-control" name="no_sk_kemenkumham" id="tlp" placeholder="Jawaban anda" required value="{{$data->no_sk_kemenkumham}}">
                </div>
                <div class="mb-3">
                    <label for="tlp" class="form-label">Nama Kepala Lembaga</label>
                    <input type="text" class="form-control" name="nama_kepala_lembaga" id="tlp" placeholder="Jawaban anda" required value="{{$data->nama_kepala_lembaga}}">
                </div>
                <div class="mb-3">
                    <label for="tlp" class="form-label">No. Tlp/Hp</label>
                    <input type="number" class="form-control" name="tlp" id="tlp" placeholder="Jawaban anda" required value="{{$data->tlp}}">
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
@endforeach
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