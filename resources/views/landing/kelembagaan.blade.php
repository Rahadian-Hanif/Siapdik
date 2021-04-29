@extends('landing.layout')

@section('konten')

<div class="container mt-5 mb-5">
    <div class="img-fluid text-center">
        <img src="{{asset('assets/img/LOGO_PAUD-removebg-preview.svg')}}" alt="" width="200" height="120">
    </div>
    <div class= "text-center mt-5">
        <h3>Deskripsi Umum</h3>
    </div>
    <p>
        Dinas Pendidikan Kabupaten Lamongan merupakan unsur pelaksana urusan pemerintahan bidang pendidikan pada lingkup wilayah Kabupaten Lamongan. Dinas Pendidikan sebagaimana dipimpin oleh Kepala Dinas yang berkedudukan di bawah dan bertanggung jawab kepada Bupati melalui Sekretaris Daerah pelaksanaan fungsi lain yang diberikan oleh Bupati terkait dengan tugas dan fungsinya.<br/><br/>
        Dinas Pendidikan dalam melaksanakan tugas berwenang meyusun rencana kerja Dinas Pendidikan, merumuskan kebijakan teknis urusan pemerintahan bidang pendidikan, melaksanaan pelayanan, pembinaan, dan pengendalian urusan pemerintahan bidang pendidikan, mengevaluasi dan pelaporan pelaksanaan urusan pemerintahan bidang pendidikan, melaksanakan kesekretariatan dinas, serta melaksanakan tugas lain yang diberikan oleh Bupati sesuai tugas dan fungsinya dan/atau sesuai ketentuan peraturan perundang undangan. Dinas Pendidikan  Kabupaten Lamongan berlokasi di  Jl. KH. Ahmad Dahlan No.75, Jetis, Kec. Lamongan, Kabupaten Lamongan, Jawa Timur 62214.
    </p>
    <div class= "text-center mt-5 mb-5">
        <h1>Prosedur Pengajuan Lembaga dapat dilihat disini</h1>
        <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Prosedur
        </button>
    </div>
</div>




<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog  modal-xl">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel"></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="ratio ratio-16x9">
                <iframe src="assets/prosedur/PROSEDUR PENGAJUAN LEMBAGA.pdf" allowfullscreen></iframe>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>
@endsection