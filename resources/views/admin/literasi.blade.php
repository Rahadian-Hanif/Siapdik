@extends('admin.layout')

@section("konten")

<div class="container">
    <div class="mt-5 text-center">
        <h3>Literasi</h3>
    </div>
    <div class="card shadow-sm mt-5">
        <div class="card-body table-responsive">
            <table class="table datatable table-hover">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">Lembaga</th>
                        <th scope="col">NIP</th>
                        <th scope="col">Nama Guru</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Jenis Buku</th>
                        <th scope="col">Judul Buku</th>
                        <th scope="col">Action</th>                        
                    </tr>
                </thead>
                <tbody>
                @foreach ($literasi as $data)
                    <tr>
                        <td>{{$data->nama_lembaga}}</td>
                        <td>{{$data->NIP}}</td>
                        <td>{{$data->nama}}</td>                        
                        <td>{{$data->jabatan}}</td>
                        <td>{{$data->jenis_buku}}</td>
                        <td>{{$data->judul_buku}}</td>
                        <td>
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#view{{$data->id}}">
                                <i class="fas fa-eye"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

<!-- Modal View -->
@foreach ($literasi as $data)
<div class="modal fade" id="view{{$data->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">View</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="ratio ratio-16x9">
                        <iframe class="embed-responsive-item" src="assets/buku/{{$data->berkas}}" allowfullscreen></iframe>
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