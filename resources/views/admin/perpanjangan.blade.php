@extends('admin.layout')

@section("konten")

<div class="container">
    <div class="mt-5 text-center">
            <h3>Pengajuan Perpanjangan</h3>
    </div>
    <div class="card shadow-sm mt-5">
        <div class="mt-3 text-center">
            <h5>Menunggu Konfirmasi</h5>
        </div>
        <div class="card-body table-responsive">
            <table class="table datatable table-hover">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">Waktu Upload</th>
                        <th scope="col">Lembaga</th>
                        <th scope="col">Berkas</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>                        
                    </tr>
                </thead>
                <tbody>
                @foreach ($perpanjangan as $data)
                    <tr>
                        <td>{{$data->tgl}}</td>
                        <td>{{$data->nama_lembaga}}</td>
                        <td>{{$data->berkas}}</td>                                                
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
                        <td>                       
                            <div class="row">
                                <a class="col btn btn-success btn-sm" href="perpanjangan_approve/{{$data->id}}" role="button">
                                    <i class="fas fa-check"></i>
                                </a>
                                <a class="col btn btn-danger btn-sm" href="perpanjangan_rejected/{{$data->id}}" role="button">
                                    <i class="fas fa-times"></i>
                                </a>
                                <a class="col btn btn-primary btn-sm" href="#view{{$data->id}}" role="button" data-bs-toggle="modal">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="card shadow-sm mt-3">
        <div class="mt-3 text-center">
            <h5>History</h5>
        </div>
        <div class="card-body table-responsive">
            <table class="table datatable table-hover">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">Waktu Upload</th>
                        <th scope="col">Lembaga</th>
                        <th scope="col">Berkas</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>                        
                    </tr>
                </thead>
                <tbody>
                @foreach ($acc as $data)
                    <tr>
                        <td>{{$data->tgl}}</td>
                        <td>{{$data->nama_lembaga}}</td>
                        <td>{{$data->berkas}}</td>                                                
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
                        <td>                           
                            <a class="col btn btn-primary btn-sm" href="#history{{$data->id}}" role="button" data-bs-toggle="modal">
                                    <i class="fas fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
    
</div>

<!-- Button trigger modal -->


<!-- Modal View-->
@foreach ($perpanjangan as $data)
    <div class="modal fade" id="view{{$data->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">View</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="ratio ratio-16x9">
                        <iframe class="embed-responsive-item" src="assets/perpanjangan/{{$data->berkas}}" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    
                </div>
            </div>
        </div>
    </div>
@endforeach

<!-- Modal View History-->
@foreach ($acc as $data)
    <div class="modal fade" id="history{{$data->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">View</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="ratio ratio-16x9">
                        <iframe class="embed-responsive-item" src="assets/perpanjangan/{{$data->berkas}}" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    
                </div>
            </div>
        </div>
    </div>
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