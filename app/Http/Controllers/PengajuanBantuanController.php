<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bantuan;
use App\Models\DataLembaga;
use File;
use DB;

class PengajuanBantuanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {   
        $id = auth()->user()->id;
        $idLembaga  = DataLembaga::where('id_user',$id)->get('id');
        
        // var_dump($idLembaga);
        foreach ($idLembaga as $idLembaga) {
            $data = Bantuan::all()->where('id_lembaga','=',$idLembaga->id);
            return view('user.pengajuanBantuan',compact('data'));
        }
    }

    public function admin()
    {   
        $bantuan = DB::table('pengajuan_bantuan')
                            ->join('lembaga','lembaga.id','=','pengajuan_bantuan.id_lembaga')
                            ->select('lembaga.nama_lembaga','pengajuan_bantuan.*')
                            ->where('pengajuan_bantuan.status','=','Dievaluasi')
                            ->get();
        $history = DB::table('pengajuan_bantuan')
                            ->join('lembaga','lembaga.id','=','pengajuan_bantuan.id_lembaga')
                            ->select('lembaga.nama_lembaga','pengajuan_bantuan.*')
                            ->where('pengajuan_bantuan.status','<>','Dievaluasi')
                            ->get();
        return view('admin.pengajuanBantuan',compact('bantuan','history'));
    }

    public function approve($id,Request $request)
    {
        $Bantuan         = Bantuan::find($id);
        $Bantuan->status = "Terverifikasi";
        $Bantuan->save();
        return redirect('pengajuanBantuan_admin')->with('success','Data berhasil diedit');
        
    }

    public function rejected($id,Request $request)
    {
        $Bantuan         = Bantuan::find($id);
        $Bantuan->status = "Ditolak";
        $Bantuan->save();
        return redirect('pengajuanBantuan_admin')->with('success','Data berhasil diedit');
        
    }

    public function proses_upload(Request $request){
            $this->validate($request, [
                'file' => 'required|mimes:jpeg,png,jpg,pdf,docx'
            ]);

            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('file');

            $nama_file = time()."_".$file->getClientOriginalName();

            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'assets/proposalBantuan';
            $file->move($tujuan_upload,$nama_file);

            date_default_timezone_set("Asia/Jakarta");
            $tgl = date("Y/m/d h:i:s");

            $id = auth()->user()->id;
            $idLembaga  = DataLembaga::where('id_user',$id)->get('id');

            foreach ($idLembaga as $idLembaga) {
                Bantuan::create([                    
                    
                    'id_lembaga' => $idLembaga->id,
                    'tgl' => $tgl,
                    'jenis' => $request->jenis,
                    'berkas' => $nama_file,
                    'status' => 'Dievaluasi',
                    

                ]);
            }
            
            return back()
            ->with('success','File berhasil di upload.');
	}
}
