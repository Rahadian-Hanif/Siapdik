@extends('admin.layout')

@section("konten")

<div class="container">
    <div class="mt-5 text-center">
        <p>
            Upload laporan surat keluar disini
        </p>
        <button type="button" class="btn btn-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#upload">
            <strong>Upload</strong>
        </button>
    </div>
    <div class="card shadow-sm mt-3">
        <div class="mt-5 text-center">
        </div>
        <div class="card-body table-responsive">
            <table class="table datatable table-hover">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Nama Lembaga</th>
                        <th scope="col">Prihal</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Action</th>                       
                    </tr>
                </thead>
                <tbody>
                @foreach ($SuratMasuk as $data)
                    <tr>
                        <td>{{$data->tgl}}</td>
                        <td>{{$data->nama_lembaga}}</td>
                        <td>{{$data->prihal}}</td>
                        <td>{{$data->alamat}}</td>
                        <td>
                            <div class="row">
                                <a class="col btn btn-primary btn-sm" href="#view{{$data->id}}" role="button" data-bs-toggle="modal">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a class="col btn btn-danger btn-sm" href="hapus_suratMasuk/{{$data->id}}" role="button">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
    
</div>

<!-- Button trigger modal -->


<!-- Modal -->
<form action="upload_suratMasuk/keluar" method="POST" enctype="multipart/form-data">
@csrf
    <div class="modal fade" id="upload" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
            <div class="modal-header">                        
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">        
                <div id="message"></div>                
                    <div>
                        <input class="form-control shadow" type="file" name="file" id="file" autofocus required/>
                    </div>
                    <br/>
                    <div>
                        <label class="form-label">Prihal</label>
                        <input class="form-control shadow" type="text" name="prihal" required placeholder="Jawaban Anda"/>
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Lembaga</label>
                        <select name="id_lembaga" class="form-select shadow" aria-label="Default select example" required>
                            <option selected>Pilih</option>
                            @foreach ($Lembaga as $data)
                            <option value="{{$data->id}}">{{$data->nama_lembaga}}</option>
                            @endforeach                        
                        </select>
                    </div>
                    <br/>
                    <div class="ratio ratio-16x9">
                        <iframe id="previewing" src="" allowfullscreen></iframe>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger rounded-pill" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary rounded-pill">
                    <i class="fas fa-upload"></i>                
                    Upload
                </button>
            </div>
            </div>
        </div>
    </div>
</form>

<!-- Modal View -->
@foreach ($SuratMasuk as $data)
<div class="modal fade" id="view{{$data->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">View</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="ratio ratio-16x9">
                        <iframe class="embed-responsive-item" src="assets/persuratan/{{$data->berkas}}" allowfullscreen></iframe>
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
    $(function() {
        $("#file").change(function() {
            $("#message").empty(); // To remove the previous error message
            var file = this.files[0];
            var imagefile = file.type;
            var match= ["image/jpeg","image/png","image/jpg","application/pdf",];
            
            if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]) || (imagefile==match[3]) ))
            {
            $("#file").css("color","red");
            $('#previewing').attr('src','');
            $("#message").html("<p class='error'>Please select a valid file, Only pdf, jpeg, jpg and png Images type allowed</p>");
            return false;
            } else {
            var reader = new FileReader();
            reader.onload = imageIsLoaded;
            reader.readAsDataURL(this.files[0]);

            // for validate image size
            var limit = 104857600; //2MB ==> 1048576 bytes = 1MB;
            if(this.files[0].size > limit){
            $("#message").html('<p class="warning">Size is large, max size 100MB!</p>');
                $("#file").css("color","red");
            }
            }
        });
    });

    function imageIsLoaded(e) {
        $("#file").css("color","green");
        $('#image_preview').css("display", "block");
        $('#previewing').attr('src', e.target.result);
        $('#previewing').attr('width', '555px');
        $('#previewing').attr('height', '277px');
    };
</script>

<script>
    $(document).ready(function() {
            $('.datatable').DataTable({
            "order": [[ 0, "desc" ]]
        });
    } );
</script>
@endsection