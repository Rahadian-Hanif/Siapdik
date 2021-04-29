@extends('user.layout')

@section("konten")

<div class="container">
    <div class="mt-5 text-center">
        <p>
            Prosedur pengajuan perpanjangan lembaga bisa dilihat disini 
            <button type="button" class="btn btn-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#prosedur">Prosedur.pdf</button>
        </p>
        <p>
            Upload Berkas perpanjangan lembaga disini
        </p>
        <button type="button" class="btn btn-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#upload">
            <strong>Upload</strong>
        </button>
    </div>
    <div class="card shadow-sm mt-3">
        <div class="mt-5 text-center">
            <h3>History</h3>
        </div>
        <div class="card-body table-responsive">
            <table class="table datatable table-hover">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">Waktu Upload</th>
                        <th scope="col">Berkas</th>
                        <th scope="col">Status</th>                        
                    </tr>
                </thead>
                <tbody>
                @foreach ($perpanjangan as $data)
                    <tr>
                        <td>{{$data->tgl}}</td>
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
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
    
</div>

<!-- Button trigger modal -->


<!-- Modal -->
<form action="perpanjangan_upload" method="POST" enctype="multipart/form-data">
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
                        <input class="form-control shadow" type="file" name="file" id="file" autofocus />
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

<!-- Modal -->
<div class="modal fade" id="prosedur" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog  modal-xl">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel"></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="ratio ratio-16x9">
                <iframe src="assets/prosedur/berkas pendukung perpanjangan lembaga.pdf" allowfullscreen></iframe>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>
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