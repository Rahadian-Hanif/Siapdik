@extends('landing.layout')

@section('konten')

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-4 mb-5">
            <img class="img-fluid" src="{{asset('assets/GALERI/PAUD TANGGUH.jpeg')}}" alt="">
            <h3>PAUD Tangguh</h3>
        </div>
        <div class="col-8 mb-5">
            <h3>PELATIHAN KREATIFITAS PENDIDIK PAUD</h3>
            <img class="img-fluid" src="{{asset('assets/GALERI/PELATIHAN KREATIFITAS PENDIDIK PAUD.jpeg')}}" alt="">
        </div>
        <div class="col-8 mb-5">
            <h3>PENILAIAN SEKOLAH TANGGUH SEMERU</h3>
            <img class="img-fluid" src="{{asset('assets/GALERI/PENILAIAN SEKOLAH TANGGUH SEMERU.jpg')}}" alt="">
        </div>
        <div class="col-4 mb-5">
            <img class="img-fluid" src="{{asset('assets/GALERI/SAGU-SAKU.jpeg')}}" alt="">
            <h3>SAGU-SAKU</h3>
        </div>
        <div class="col mb-5">
            <h3>SEKOLAH RAMAH ANAK</h3>
            <img class="img-fluid" src="{{asset('assets/GALERI/SEKOLAH RAMAH ANAK.jpg')}}" alt="">
        </div>
        <div class="col mb-5">
            <h3>SOSIALISASI PROGRAM</h3>
            <img class="img-fluid" src="{{asset('assets/GALERI/SOSIALISASI PROGRAM.jpeg')}}" alt="">
        </div>
    </div>
</div>


@endsection