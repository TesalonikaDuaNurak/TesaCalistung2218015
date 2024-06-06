<?php

namespace App\Http\Controllers;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function index()
    {
    	// mengambil data dari table pegawai
 $user = Users::all();
    	// mengirim data pegawai ke view index
    	return view('layout/users',['user'=>$user]);
 
    }

    public function tambahuser()
    {
    	// mengambil data dari table pegawai
    	
 
    	// mengirim data pegawai ke view index
    	return view('layout/tambahuser');
 
    }

    public function insertdata2(Request $request)
    {
        Users::create($request->all());
        
    	// mengirim data pegawai ke view index
    	return redirect()->route('users');
        
        // mengambil data dari table pegawai
 
    	// mengirim data pegawai ke view index
    	
 
    }

    public function ubahuser($id)
    {
    	// mengambil data dari table pegawai
        $user = Users::find($id);
 
    	// mengirim data pegawai ke view index
    	return view('layout/ubahuser',compact('user'));
 
    }

    public function updatedata2(Request $request, $id)
    {
    	// mengambil data dari table pegawai
        $user = Users::find($id);
        $user->update($request->all());
        
    	// mengirim data pegawai ke view index
    	return redirect()->route('users');
 
    }

    public function deleteuser($id)
    {
    	// mengambil data dari table pegawai
        $user = Users::find($id_user);
        $user->delete();
        
    	// mengirim data pegawai ke view index
    	return redirect()->route('users');
 
    }

    
}
