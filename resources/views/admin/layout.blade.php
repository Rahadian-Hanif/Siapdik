<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <!--Datatable -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>
        
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <!-- Javascrip Datatable -->
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" ></script>
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
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{url('admin/home')}}">Dashboard</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="#">Kelembagan</a>
                        </li> -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Kelembagaan
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                <li><a class="dropdown-item" href="{{url('daftarLembaga_admin')}}">Daftar Lembaga</a></li>
                                <li><a class="dropdown-item" href="{{url('perpanjangan_admin')}}">Perpanjangan Lembaga</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Keuangan
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                <li><a class="dropdown-item" href="{{url('pengajuanBantuan_admin')}}">Pengajuan Bantuan</a></li>
                                <li><a class="dropdown-item" href="{{url('laporanBantuan_admin')}}">Laporan Pengajuan Bantuan</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Persuratan
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                <li><a class="dropdown-item" href="{{url('SuratMasuk')}}">Surat Masuk</a></li>
                                <li><a class="dropdown-item" href="{{url('SuratKeluar')}}">Surat Keluar</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('literasi_admin')}}">Literasi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('manajemenUser')}}">Manajemen User</a>
                        </li>
                    </ul>
                    <span class="navbar-text">
                        <div class="dropdown">
                            <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user"></i>
                                USER
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="{{url('logout')}}">Keluar</a></li>
                            </ul>
                        </div>
                    </span>
                </div>
            </div>
        </nav>

        @yield('konten')
        
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        @yield('js')
        <!-- <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
 
                var data = google.visualization.arrayToDataTable([
                    ['Month Name', 'Registered User Count'],
                    ['April', "70"],
                        
                ]);
        
                var options = {
                    is3D: false,
                };
        
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        
                chart.draw(data, options);
            }
        </script>
        <script type="text/javascript">
 
            google.charts.load('current', {'packages':['bar']});
            google.charts.setOnLoadCallback(drawChart);
        
            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Order Id', 'Price', 'Product Name'],
                    ['sdfdsfdfsfds', "546546", "6556"],
                    
                ]);
        
                var options = {
                chart: {
                    
                    
                },
                bars: 'vertical'
                };
                var chart = new google.charts.Bar(document.getElementById('barchart_material'));
                chart.draw(data, google.charts.Bar.convertOptions(options));
            }
        </script> -->
    </body>
</html>