<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Literasi;
use App\Models\DataLembaga;
use DB;

class LiterasiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {   
        $id = auth()->user()->id;
        $idLembaga  = DataLembaga::where('id_user',$id)->get('id');

        foreach ($idLembaga as $idLembaga) {
            $data = Literasi::where('id_lembaga',$idLembaga->id)->get();
            return view('user.literasi',compact('data'));
        }
        

    }

    public function admin()
    {   
        $literasi = DB::table('literasi')
                            ->join('lembaga','lembaga.id','=','literasi.id_lembaga')
                            ->select('lembaga.nama_lembaga','literasi.*')
                            ->get();
        return view('admin.literasi',compact('literasi'));
    }

    public function add(Request $request)
    {
        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('file');

        $nama_file = time()."_".$file->getClientOriginalName();

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'assets/buku';
        $file->move($tujuan_upload,$nama_file);

        $id = auth()->user()->id;
        $idLembaga  = DataLembaga::where('id_user',$id)->get('id');
        foreach ($idLembaga as $idLembaga) {
            Literasi::create([

                'id_lembaga'            => $idLembaga->id,
                'NIP'                   => $request->nip,
                'nama'                  => $request->nama,
                'jenis_kelamin'         => $request->jenis_kelamin,
                'alamat'                => $request->alamat,
                'jabatan'               => $request->jabatan,
                'jenis_buku'            => $request->jenis_buku,
                'judul_buku'            => $request->judul_buku,
                'berkas'                => $nama_file,
                'tlp'                   => $request->tlp,

            ]);
        }

        return back()
            ->with('literasi','Data berhasil ditambahkan');

    }

    public function delete($id)
    {
        // hapus data
        Literasi::where('id',$id)->delete();
            
        return back()
        ->with('literasi','Data berhasil dihapus');
    }

    public function edit($id,Request $request)
    {
        $literasi                = Literasi::find($id);
        $literasi->NIP           = $request->nip;
        $literasi->nama          = $request->nama;
        $literasi->jenis_kelamin = $request->jenis_kelamin;
        $literasi->alamat        = $request->alamat;
        $literasi->jabatan       = $request->jabatan;
        $literasi->jenis_buku    = $request->jenis_buku;
        $literasi->judul_buku    = $request->judul_buku;
        $literasi->tlp           = $request->tlp;
        $literasi->save();

        return redirect('literasi')->with('success','Data berhasil diedit');

    }
}
