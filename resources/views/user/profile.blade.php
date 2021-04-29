@extends('user.layout')

@section("konten")

<div class="container">
    
    <a class="btn btn-light text-primary rounded-pill mt-3" data-bs-toggle="modal" href="#edit" role="button">
        <i class="far fa-edit"></i>
        Edit
    </a>
            
    <div class="card mt-3 mb-5 shadow">
        <div class="card-header text-center">
            <h3>Data Lembaga</h3>            
        </div>
        <div class="card-body">
            <div class="row">
            @foreach ($profile as $data)
                <div class="col-4 mb-3">
                    <strong>Nama Lembaga</strong>
                </div>
                <div class="col-8 mb-3">
                    {{$data->nama_lembaga}}
                </div>
                <div class="col-4 mb-3">
                    <strong>Jumlah Guru</strong>
                </div>
                <div class="col-8 mb-3">
                    <div class="row">
                        <div class="col">
                        <strong>Laki-Laki: </strong> {{$data->jumlah_guru_lk}}
                        </div>
                        <div class="col">
                        <strong>Perempuan: </strong> {{$data->jumlah_guru_pr}}
                        </div>
                    </div>
                </div>
                <div class="col-4 mb-3">
                    <strong>Jumlah Murid</strong>
                </div>
                <div class="col-8 mb-3">
                    <div class="row">
                        <div class="col">
                        <strong>Laki-Laki: </strong> {{$data->jumlah_murid_lk}}
                        </div>
                        <div class="col">
                        <strong>Perempuan: </strong> {{$data->jumlah_murid_pr}}
                        </div>
                    </div>
                </div>
                <div class="col-4 mb-3">
                    <strong>Status Akreditasi</strong>
                </div>
                <div class="col-8 mb-3">
                    {{$data->akreditasi}}
                </div>
                <div class="col-4 mb-3">
                    <strong>Alamat</strong>
                </div>
                <div class="col-8 mb-3">
                    {{$data->alamat}}
                </div>
                <div class="col-4 mb-3">
                    <strong>No. Izin Pendirian</strong>
                </div>
                <div class="col-8 mb-3">
                    {{$data->no_izin_pendirian}}
                </div>
                <div class="col-4 mb-3">
                    <strong>Tahun Pendirian</strong>
                </div>
                <div class="col-8 mb-3">
                    {{$data->tahun_pendirian}}
                </div>
                <div class="col-4 mb-3">
                    <strong>NPSN</strong>
                </div>
                <div class="col-8 mb-3">
                    {{$data->NPSN}}
                </div>
                <div class="col-4 mb-3">
                    <strong>No. SK Kemenkumham</strong>
                </div>
                <div class="col-8 mb-3">
                    {{$data->no_sk_kemenkumham}}
                </div>
                <div class="col-4 mb-3">
                    <strong>Nama Kepala Lembaga</strong>
                </div>
                <div class="col-8 mb-3">
                    {{$data->nama_kepala_lembaga}}
                </div>
                <div class="col-4 mb-3">
                    <strong>No. Tlp/Hp</strong>
                </div>
                <div class="col-8 mb-3">
                    {{$data->tlp}}
                </div>

                <!-- Modal edit-->
                    <div class="modal fade" id="edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Edit</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="edit_profile" method="POST">
                            @csrf
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
                                <button type="button" class="btn btn-primary"  data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#edit_password">Edit Password</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                            </div>
                            </form>
                        </div>
                    </div>
            @endforeach
            </div>
            
        </div>
    </div>
    
</div>


<!-- Modal edit password-->
@foreach ($profile as $data)
<form action="edit_password_user" method="post">
@csrf
    <div class="modal fade" id="edit_password" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="username" class="form-label">Pssword baru</label>
                    <input type="password" name="password" class="form-control" id="username" aria-describedby="usernameHelp" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">batal</button>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
            </div>
        </div>
    </div>
</form>
@endforeach
@endsection