@extends('user.layout')

@section("konten")

<div class="container">
    <div class="mt-5 text-center">
        <h2>Daftar Lembaga</h2>
    </div>
    <div class="card shadow-sm mt-5">
        <div class="card-body table-responsive">
            <table class="table datatable table-hover">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">NPSN</th>
                        <th scope="col">Nama Lembaga</th>
                        <th scope="col">Akreditasi</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">No. Telpon</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($dataLembaga as $data)
                    <tr>
                        <td>{{$data->NPSN}}</td>
                        <td>{{$data->nama_lembaga}}</td>
                        <td>{{$data->akreditasi}}</td>
                        <td>{{$data->alamat}}</td>
                        <td>{{$data->tlp}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
    
</div>


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