<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <style>
            /* Chrome, Safari, Edge, Opera */
            input::-webkit-outer-spin-button,
            input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
            }

            /* Firefox */
            input[type=number] {
            -moz-appearance: textfield;
            }
        </style>
        <title>Dashboard</title>
        
    </head>
    <body>
        <nav class="navbar navbar-dark" style="background-color: #375cd5;">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <div class="row">
                        <div class="col">
                            <img src="{{asset('assets/img/LOGO_DISDIK-removebg-preview.svg')}}" alt="" width="100" height="70">
                            <img src="{{asset('assets/img/LOGO_PAUD-removebg-preview.svg')}}" alt="" width="100" height="70">
                        </div>
                        <div class="col">
                            <strong>SIAPDIK</strong>
                            <br>
                            KABUPATEN LAMONGAN
                        </div>
                    </div>
                </a>
                
            </div>
        </nav>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <h3>Silahkan mengisi data berikut</h3>
                    </ul>
                    <span class="navbar-text">
                        <div class="dropdown">
                            <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user"></i>
                                USER
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                
                                <li><a class="dropdown-item" href="logout">Keluar</a></li>
                            </ul>
                        </div>
                    </span>
                </div>
            </div>
        </nav>


<div class="container">
    <form action="frist_profile" method="POST">
        @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label for="nip" class="form-label">Nama Lembaga</label>
                <input type="text" class="form-control" name="nama_lembaga" id="nip" placeholder="Jawaban anda" required>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Jumlah Guru</label>
                <div class="row">
                    <div class="col">
                        Laki-Laki
                        <input type="text" class="form-control" name="jumlah_guru_lk" id="nama" placeholder="Jawaban anda" required >
                    </div>
                    <div class="col">
                        Perempuan
                        <input type="text" class="form-control" name="jumlah_guru_pr" id="nama" placeholder="Jawaban anda" required>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="jenisKelamin" class="form-label">Jumlah Murid</label>
                <div class="row">
                    <div class="col">
                        Laki-Laki
                        <input type="text" class="form-control" name="jumlah_murid_lk" id="jenisKelamin" placeholder="Jawaban anda" required>
                    </div>
                    <div class="col">
                        Perempuan
                        <input type="text" class="form-control" name="jumlah_murid_pr" id="jenisKelamin" placeholder="Jawaban anda" required>
                    </div>
                </div>                                    
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Status Akreditasi</label>
                <input type="text" class="form-control" name="akreditasi" id="alamat" placeholder="Jawaban anda" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Kecamatan</label>
                <input type="text" class="form-control" name="kecamatan" id="alamat" placeholder="Jawaban anda" required>
            </div>
            <div class="mb-3">
                <label for="jabatan" class="form-label">Alamat</label>
                <input type="text" class="form-control" name="alamat" id="jabatan" placeholder="Jawaban anda" required>
            </div>
            <div class="mb-3">
                <label for="jenisBuku" class="form-label">No. Izin Pendirian</label>
                <input type="text" class="form-control" name="no_izin_pendirian" id="jenisBuku" placeholder="Jawaban anda" required>
            </div>
            <div class="mb-3">
                <label for="judulbuku" class="form-label">Tahun Pendirian</label>
                <input type="text" class="form-control" name="tahun_pendirian" id="judulbuku" placeholder="Jawaban anda" required>
            </div>
            <div class="mb-3">
                <label for="tlp" class="form-label">NPSN</label>
                <input type="text" class="form-control" name="NPSN" id="tlp" placeholder="Jawaban anda" required>
            </div>
            <div class="mb-3">
                <label for="tlp" class="form-label">No. SK Kemenkumham</label>
                <input type="text" class="form-control" name="no_sk_kemenkumham" id="tlp" placeholder="Jawaban anda" required>
            </div>
            <div class="mb-3">
                <label for="tlp" class="form-label">Nama Kepala Lembaga</label>
                <input type="text" class="form-control" name="nama_kepala_lembaga" id="tlp" placeholder="Jawaban anda" required>
            </div>
            <div class="mb-3">
                <label for="tlp" class="form-label">No. Tlp/Hp</label>
                <input type="number" class="form-control" name="tlp" id="tlp" placeholder="Jawaban anda" required>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-success">Simpan</button>
        </div>
        </div>
    </form>
    
</div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    </body>
</html>