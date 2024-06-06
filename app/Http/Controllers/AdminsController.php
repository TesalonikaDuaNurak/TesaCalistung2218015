<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AdminsController extends Controller
{
    public function index()
    {
    	// mengambil data dari table pegawai
 $admin = Admin::all();
    	// mengirim data pegawai ke view index
    	return view('layout/admins',['admin'=>$admin]);
 
    }

    public function tambahadmin()
    {
    	// mengambil data dari table pegawai
    	
 
    	// mengirim data pegawai ke view index
    	return view('layout/tambahadmin');
 
    }

    public function insertdata1(Request $request)
    {
        Admin::create($request->all());
        
    	// mengirim data pegawai ke view index
    	return redirect()->route('admins');
        
        // mengambil data dari table pegawai
 
    	// mengirim data pegawai ke view index
    	
 
    }

    public function ubahadmin($id)
    {
    	// mengambil data dari table pegawai
        $admin = Admin::find($id);
 
    	// mengirim data pegawai ke view index
    	return view('layout/ubahadmin',compact('admin'));
 
    }

    public function updatedata1(Request $request, $id)
    {
    	// mengambil data dari table pegawai
        $admin = Admin::find($id);
        $admin->update($request->all());
        
    	// mengirim data pegawai ke view index
    	return redirect()->route('admins');
 
    }

    public function deleteadmin($id)
    {
    	// mengambil data dari table pegawai
        $admin = Admin::find($id);
        $admin->delete();
        
    	// mengirim data pegawai ke view index
    	return redirect()->route('admins');
 
    }

    
}
