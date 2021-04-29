<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        
        <title>Hello, world!</title>
        
    </head>
    <body>    
        <nav class="navbar navbar-dark navbar-expand-md bg-faded justify-content-center" style="background-color: #375cd5;">
            <div class="container">
                    <a href="/" class="navbar-brand d-flex w-50 me-auto img-fluid">
                        <img src="{{asset('assets/img/LOGO_DISDIK-removebg-preview.svg')}}" alt="" width="100" height="70">
                        <img src="{{asset('assets/img/LOGO_PAUD-removebg-preview.svg')}}" alt="" width="100" height="70">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsingNavbar3">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="navbar-collapse collapse w-100" id="collapsingNavbar3">
                        <ul class="navbar-nav w-100 justify-content-center">
                            <li class="nav-item">
                                <a class="nav-link active" href="/">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="/literasi2">Literasi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="galeri">Galeri</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="kelembagaan">Kelembagaan</a>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav ms-auto w-100 justify-content-end">
                            <a class="btn btn-light text-primary rounded-pill" href="login" role="button">
                                <i class="fas fa-user"></i>
                                Masuk
                            </a>
                        </ul>
                    </div>
            </div>
        </nav>
        <img class="img-fluid" src="{{asset('assets/img/Group 39.svg')}}" alt="">
        <!-- <div class="container-fluid position-absolute top-50 start-0 translate-middle-y text-white" >
            <h1><strong>SISTEM INFORMASI AKADEMIK PAUD</strong></hi><br>
            <hi>DINAS PENDIDIKAN KABUPATEN LAMONGAN</h1>
        </div> -->

        @yield('konten')
        
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    </body>
</html>