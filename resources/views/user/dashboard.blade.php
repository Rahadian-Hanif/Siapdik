@extends('user.layout')

@section("konten")

<div class="container">
    <p>Selamat Datang! Di Sistem Akademik Paud</p>

    <div class="mt-3">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header">
                        <i class="fas fa-chart-pie"></i>
                        Data Guru
                    </div>
                    <div class="card-body">
                        <div id="piechart"></div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow">
                    <div class="card-header">
                        Data Siswa
                    </div>
                    <div class="card-body">
                        <div id="piechart2"></div>
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
                ['Gender', 'Total'],
                @php
                    foreach($gurulk as $d) {
                        echo "['Laki-laki', ".$d->jumlah_guru_lk."],";
                    }
                    foreach($gurupr as $d) {
                        echo "['Laki-laki', ".$d->jumlah_guru_pr."],";
                    }
                @endphp
                ]);

                var options = {
                title: 'Jumlah Guru'
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                chart.draw(data, options);
            }
        </script>
        <script type="text/javascript">

            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {

                var data = google.visualization.arrayToDataTable([
                ['Gender', 'Total'],
                @php
                    foreach($muridlk as $d) {
                        echo "['Laki-laki', ".$d->jumlah_murid_lk."],";
                    }
                    foreach($muridpr as $d) {
                        echo "['Laki-laki', ".$d->jumlah_murid_pr."],";
                    }
                @endphp
                ]);

                var options = {
                title: 'Jumlah Guru'
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

                chart.draw(data, options);
            }
        </script>
@endsection