<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persuratan;
use App\Models\DataLembaga;
use DB;

class PersuratanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $SuratMasuk = DB::table('persuratan')
                        ->join('lembaga','lembaga.id','=','persuratan.id_lembaga')
                        ->select('lembaga.nama_lembaga','lembaga.alamat','persuratan.*')
                        ->where('persuratan.jenis','=','masuk')
                        ->get();
        $Lembaga  = DataLembaga::all();
        return view('admin.suratMasuk',compact('SuratMasuk','Lembaga'));
    }

    public function keluar()
    {
        $SuratMasuk = DB::table('persuratan')
                        ->join('lembaga','lembaga.id','=','persuratan.id_lembaga')
                        ->select('lembaga.nama_lembaga','lembaga.alamat','persuratan.*')
                        ->where('persuratan.jenis','=','keluar')
                        ->get();
        $Lembaga  = DataLembaga::all();
        return view('admin.suratKeluar',compact('SuratMasuk','Lembaga'));
        
    }

    public function upload($jenis,Request $request){
            $this->validate($request, [
                'file' => 'required|mimes:jpeg,png,jpg,pdf,docx'
            ]);

            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('file');

            $nama_file = time()."_".$file->getClientOriginalName();

            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'assets/persuratan';
            $file->move($tujuan_upload,$nama_file);

            date_default_timezone_set("Asia/Jakarta");
            $tgl = date("Y/m/d");

            Persuratan::create([
                'berkas' => $nama_file,
                'tgl' => $tgl,
                'id_lembaga' => $request->id_lembaga,
                'prihal' => $request->prihal,
                'jenis' => $jenis,

            ]);
            
            return back()
            ->with('success','File berhasil di upload.');
	}

    public function delete($id)
    {
        Persuratan::where('id',$id)->delete();
        return back()
        ->with('success','File berhasil di hapus.');
    
    }
}
