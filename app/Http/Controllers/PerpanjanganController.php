<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perpanjangan;
use App\Models\DataLembaga;
use File;
use DB;

class PerpanjanganController extends Controller
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
            $perpanjangan = Perpanjangan::all()->where('id_lembaga','=',$idLembaga->id);
            return view('user.perpanjangan',compact('perpanjangan'));
        }
    
    }

    public function admin()
    {
        $perpanjangan = DB::table('perpanjangan')
                            ->join('lembaga','lembaga.id','=','perpanjangan.id_lembaga')
                            ->select('lembaga.nama_lembaga','perpanjangan.*')
                            ->where('perpanjangan.status','=','Dievaluasi')
                            ->get();

        $acc = DB::table('perpanjangan')
                            ->join('lembaga','lembaga.id','=','perpanjangan.id_lembaga')
                            ->select('lembaga.nama_lembaga','perpanjangan.*')
                            ->where('perpanjangan.status','<>','Dievaluasi')
                            ->get();
        // $perpanjangan = Perpanjangan::all()->where('status','=','Dievaluasi');
        return view('admin.perpanjangan',compact('perpanjangan','acc'));
        
    }

    public function approve($id,Request $request)
    {
        $perpanjangan         = Perpanjangan::find($id);
        $perpanjangan->status = "Terverifikasi";
        $perpanjangan->save();
        return redirect('perpanjangan_admin')->with('success','Data berhasil diedit');
        
    }

    public function rejected($id,Request $request)
    {
        $perpanjangan         = Perpanjangan::find($id);
        $perpanjangan->status = "Ditolak";
        $perpanjangan->save();
        return redirect('perpanjangan_admin')->with('success','Data berhasil diedit');
        
    }

    public function proses_upload(Request $request){
            $this->validate($request, [
                'file' => 'required|mimes:jpeg,png,jpg,pdf,docx'
            ]);

            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('file');

            $nama_file = time()."_".$file->getClientOriginalName();

            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'assets/perpanjangan';
            $file->move($tujuan_upload,$nama_file);

            date_default_timezone_set("Asia/Jakarta");
            $tgl = date("Y/m/d h:i:s");

            $id = auth()->user()->id;
            $idLembaga  = DataLembaga::where('id_user',$id)->get('id');

            foreach ($idLembaga as $idLembaga) {
                Perpanjangan::create([
                    'berkas' => $nama_file,
                    'tgl' => $tgl,
                    'id_lembaga' => $idLembaga->id,
                    'status' => 'Dievaluasi',

                ]);
            }
            
            return back()
            ->with('success','File berhasil di upload.');
	}
}
