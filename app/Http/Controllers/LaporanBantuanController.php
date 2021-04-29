<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LaporanBantuan;
use App\Models\DataLembaga;
use File;
use DB;

class LaporanBantuanController extends Controller
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
            $data = LaporanBantuan::all()->where('id_lembaga','=',$idLembaga->id);
            return view('user.laporanBantuan',compact('data'));
        }
    }

    public function admin()
    {   
        $laporan = DB::table('laporan_bantuan')
                            ->join('lembaga','lembaga.id','=','laporan_bantuan.id_lembaga')
                            ->select('lembaga.nama_lembaga','laporan_bantuan.*')
                            ->where('laporan_bantuan.status','=','Dievaluasi')
                            ->get();
        $history = DB::table('laporan_bantuan')
                            ->join('lembaga','lembaga.id','=','laporan_bantuan.id_lembaga')
                            ->select('lembaga.nama_lembaga','laporan_bantuan.*')
                            ->where('laporan_bantuan.status','<>','Dievaluasi')
                            ->get();
        return view('admin.laporanBantuan',compact('laporan','history'));
    }

    public function approve($id,Request $request)
    {
        $Bantuan         = LaporanBantuan::find($id);
        $Bantuan->status = "Terverifikasi";
        $Bantuan->save();
        return redirect('laporanBantuan_admin')->with('success','Data berhasil diedit');
        
    }

    public function rejected($id,Request $request)
    {
        $Bantuan         = LaporanBantuan::find($id);
        $Bantuan->status = "Ditolak";
        $Bantuan->save();
        return redirect('laporanBantuan_admin')->with('success','Data berhasil diedit');
        
    }

    public function proses_upload(Request $request){
            $this->validate($request, [
                'file' => 'required|mimes:jpeg,png,jpg,pdf,docx'
            ]);

            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('file');

            $nama_file = time()."_".$file->getClientOriginalName();

            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'assets/laporanBantuan';
            $file->move($tujuan_upload,$nama_file);

            date_default_timezone_set("Asia/Jakarta");
            $tgl = date("Y/m/d h:i:s");

            $id = auth()->user()->id;
            $idLembaga  = DataLembaga::where('id_user',$id)->get('id');

            foreach ($idLembaga as $idLembaga) {
                LaporanBantuan::create([                    
                    
                    'id_lembaga' => $idLembaga->id,
                    'tgl' => $tgl,                    
                    'berkas' => $nama_file,
                    'status' => 'Dievaluasi',
                    

                ]);
            }
            
            return back()
            ->with('success','File berhasil di upload.');
	}
}
