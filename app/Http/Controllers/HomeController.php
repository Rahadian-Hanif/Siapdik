<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataLembaga;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = auth()->user()->id;
        $idLembaga  = DataLembaga::where('id_user',$id)->get('id');
        $gurulk = DataLembaga::where('id_user',$id)->get('jumlah_guru_lk');
        $gurupr = DataLembaga::where('id_user',$id)->get('jumlah_guru_pr');
        $muridlk = DataLembaga::where('id_user',$id)->get('jumlah_murid_lk');
        $muridpr = DataLembaga::where('id_user',$id)->get('jumlah_murid_pr');
        if ($idLembaga) {
            return view('user.dashboard',compact('gurulk','gurupr','muridlk','muridpr'));
        }else {
            return view('user.fristProfile');
        }
    }

    public function adminHome()
    {
        $lembaga = DB::table('lembaga')
                        ->select('kecamatan',DB::raw("COUNT(nama_lembaga) as total"))
                        ->groupBy('kecamatan')
                        ->get();
        
        $totlembaga = DB::table('lembaga')
                        ->select(DB::raw("COUNT(nama_lembaga) as total"))
                        ->get();
            
        $totliterasi = DB::table('literasi')
                        ->select(DB::raw("COUNT(id) as total"))
                        ->get();

        $bantuan = DB::table('pengajuan_bantuan')
                            ->join('lembaga','lembaga.id','=','pengajuan_bantuan.id_lembaga')
                            ->select('lembaga.nama_lembaga','pengajuan_bantuan.*')
                            ->where('pengajuan_bantuan.status','=','Dievaluasi')
                            ->get();

        $perpanjangan = DB::table('perpanjangan')
                            ->join('lembaga','lembaga.id','=','perpanjangan.id_lembaga')
                            ->select('lembaga.nama_lembaga','perpanjangan.*')
                            ->where('perpanjangan.status','=','Dievaluasi')
                            ->get();
        return view('admin.dashboard',compact('lembaga','bantuan','perpanjangan','totlembaga','totliterasi'));
    }
}
