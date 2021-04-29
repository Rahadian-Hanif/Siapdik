<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataLembaga;
use App\Models\User;
use DB;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $id = auth()->user()->id;
        $profile = DataLembaga::where('id_user',$id)->get();
        return view('user.profile',compact('profile'));

    }

    public function edit(Request $request)
    {
        $id = auth()->user()->id;
        $idLembaga  = DataLembaga::where('id_user',$id)->get('id');
        foreach ($idLembaga as $idLembaga) {
            $profile                        = DataLembaga::find($idLembaga->id);
            $profile->nama_lembaga          = $request->nama_lembaga;
            $profile->jumlah_guru_lk        = $request->jumlah_guru_lk;
            $profile->jumlah_guru_pr        = $request->jumlah_guru_pr;
            $profile->jumlah_murid_lk       = $request->jumlah_murid_lk;
            $profile->jumlah_murid_pr       = $request->jumlah_murid_pr;
            $profile->akreditasi            = $request->akreditasi;
            $profile->alamat                = $request->alamat;
            $profile->no_izin_pendirian     = $request->no_izin_pendirian;
            $profile->tahun_pendirian       = $request->tahun_pendirian;
            $profile->NPSN                  = $request->NPSN;
            $profile->no_sk_kemenkumham     = $request->no_sk_kemenkumham;
            $profile->nama_kepala_lembaga	= $request->nama_kepala_lembaga;
            $profile->tlp                   = $request->tlp;
            $profile->save();
        }
        return redirect('profile')->with('success','Data berhasil diedit');

    }

    public function edit_password(Request $request)
    {
        $id = auth()->user()->id;
        $profile                        = User::find($id);
        $profile->password              = bcrypt($request->password);
        $profile->save();
        return back()->with('success','Data berhasil diedit');

    }

    public function frist(Request $request)
    {
        $id = auth()->user()->id;
        DataLembaga::create([
                    'id_user'               =>$id,
                    'nama_lembaga'          =>$request->nama_lembaga,
                    'jumlah_guru_lk'        =>$request->jumlah_guru_lk,
                    'jumlah_guru_pr'        =>$request->jumlah_guru_pr,
                    'jumlah_murid_lk'       =>$request->jumlah_murid_lk,
                    'jumlah_murid_pr'       =>$request->jumlah_murid_pr,
                    'akreditasi'            =>$request->akreditasi,
                    'kecamatan'             =>$request->kecamatan,
                    'alamat'                =>$request->alamat,
                    'no_izin_pendirian'     =>$request->no_izin_pendirian,
                    'tahun_pendirian'       =>$request->tahun_pendirian,
                    'NPSN'                  =>$request->NPSN,
                    'no_sk_kemenkumham'     =>$request->no_sk_kemenkumham,
                    'nama_kepala_lembaga'   =>$request->nama_kepala_lembaga,
                    'tlp'                   =>$request->tlp,

                ]);
        return redirect('profile')->with('success','Selamat Datang');

    }
}
