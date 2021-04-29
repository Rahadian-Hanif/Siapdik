<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataLembaga;

class DaftarLembagaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $dataLembaga = DataLembaga::all();
        return view('user.daftarLembaga',compact('dataLembaga'));
    }

    public function admin()
    {
        $dataLembaga = DataLembaga::all();
        return view('admin.daftarLembaga',compact('dataLembaga'));
    }

    public function edit($id,Request $request)
    {
        $profile                        = DataLembaga::find($id);
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
        
        return back()->with('success','Data berhasil diedit');

    }

    public function delete($id)
    {
        DataLembaga::where('id',$id)->delete();
        return back()
        ->with('success','File berhasil di hapus.');
    
    }
}
