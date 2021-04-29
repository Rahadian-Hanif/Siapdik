<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ManajemenUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user  = User::all();
        return view('admin.manajemenUser',compact('user'));
    
    }

    public function add(Request $request)
    {
        User::create([                    
                    
            'username'  => $request->username,
            'is_admin'  => $request->level,
            'password'  => bcrypt($request->username),

        ]);
        return back()
        ->with('success','File berhasil di upload.');
    
    }

    public function delete($id)
    {
        User::where('id',$id)->delete();
        return back()
        ->with('success','File berhasil di hapus.');
    
    }

    public function edit($id,Request $request)
    {
        $user                    = User::find($id);
        $user->username          = $request->username;
        $user->is_admin          = $request->level;
        $user->save();
        return back()
        ->with('success','File berhasil di upload.');
    
    }

    public function edit_password($id,Request $request)
    {
        $user                    = User::find($id);
        $user->password          = bcrypt($request->password);
        $user->save();
        return back()
        ->with('success','File berhasil.');
    
    }

}
