@extends('admin.layout')

@section("konten")

<div class="container">
    <p>Selamat Datang! Di Sistem Akademik Paud</p>

    <div class="mt-3">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header">
                        <i class="fas fa-chart-pie"></i>
                        Data Lembaga
                    </div>
                    <div class="card-body table-responsive">
                        <div id="piechart"></div>
                    </div>
                </div>
            </div>
            <div class="col row">
                <div class="col">
                    @foreach ($totlembaga as $data)
                    <div class="card shadow">
                        <div class="card-header bg-warning">
                            Jumlah Lembaga
                        </div>
                        <div class="card-body text-center" >
                            <p style="font-size: 120px;">{{$data->total}}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="col">
                    @foreach ($totliterasi as $data)
                    <div class="card shadow">
                        <div class="card-header  bg-secondary text-white">
                            Jumlah Literasi
                        </div>
                        <div class="card-body text-center">
                            <p style="font-size: 120px;">{{$data->total}}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="mt-5 mb-5 row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header">
                        Perpanjangan
                    </div>
                    <div class="card-body">
                        <table class="table datatable table-hover">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col">Waktu Upload</th>
                                    <th scope="col">Lembaga</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($perpanjangan as $data)
                                <tr>
                                    <td>{{$data->tgl}}</td>
                                    <td>{{$data->nama_lembaga}}</td>                                             
                                    @php
                                            $status = $data->status;

                                            switch ($status) {
                                            case "Dievaluasi":
                                                echo "<td class='text-warning'>$status</td>";
                                                break;
                                            case "Terverifikasi":
                                                echo "<td style='color: green;'>$status</td>";
                                                break;
                                            case "Ditolak":
                                                echo "<td class='text-danger'>$status</td>";
                                                break;
                                            }
                                    @endphp
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card shadow col">
                    <div class="card-header">
                        Pengajuan Bantuan
                    </div>
                    <div class="card-body">
                        <table class="table datatable table-hover">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col">Waktu Upload</th>
                                    <th scope="col">Lembaga</th>
                                    <th scope="col">Status</th>                        
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($bantuan as $data)
                                <tr>
                                    <td>{{$data->tgl}}</td>
                                    <td>{{$data->nama_lembaga}}</td>                                                
                                    @php
                                            $status = $data->status;

                                            switch ($status) {
                                            case "Dievaluasi":
                                                echo "<td class='text-warning'>$status</td>";
                                                break;
                                            case "Terverifikasi":
                                                echo "<td style='color: green;'>$status</td>";
                                                break;
                                            case "Ditolak":
                                                echo "<td class='text-danger'>$status</td>";
                                                break;
                                            }
                                    @endphp 
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>
    
</div>


@endsection

@section("js")
        <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {

                var data = google.visualization.arrayToDataTable([
                    ['Month Name', 'Registered User Count'],
                    @php
                    foreach($lembaga as $d) {
                        echo "['".$d->kecamatan."', ".$d->total."],";
                    }
                    @endphp
                        
                ]);
        
                var options = {
                    is3D: false,
                    
                };
        
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        
                chart.draw(data, options);
            }
        </script>
        <script type="text/javascript">

            google.charts.load("current", {packages:["corechart"]});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                ['Dinosaur', 'Length'],
                ['ayam',   2020.12000],
                ['sapi',   2021.15000],
                ]);

                var options = {
                title: 'Lengths of dinosaurs, in meters',
                legend: { position: 'none' },
                };

                var chart = new google.visualization.Histogram(document.getElementById('barchart_material'));
                chart.draw(data, options);
            }
        </script>
@endsection