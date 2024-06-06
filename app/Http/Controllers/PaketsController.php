<?php

namespace App\Http\Controllers;
use App\Models\Paket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PaketsController extends Controller
{
    public function index()
    {
    	// mengambil data dari table pegawai
 $paket = Paket::all();
    	// mengirim data pegawai ke view index
    	return view('layout/pakets',['paket'=>$paket]);
 
    }

    public function tambahpaket()
    {
    	// mengambil data dari table pegawai
    	
 
    	// mengirim data pegawai ke view index
    	return view('layout/tambahpaket');
 
    }

    public function insertdata3(Request $request)
    {
        Paket::create($request->all());
        
    	// mengirim data pegawai ke view index
    	return redirect()->route('paket');
        
        // mengambil data dari table pegawai
 
    	// mengirim data pegawai ke view index
    	
 
    }

    public function ubahpaket($id_paket)
    {
    	// mengambil data dari table pegawai
        $paket = Paket::find($id_paket);
 
    	// mengirim data pegawai ke view index
    	return view('layout/ubahpaket',compact('paket'));
 
    }

    public function updatedata3(Request $request, $id_paket)
    {
    	// mengambil data dari table pegawai
        $paket = Paket::find($id_paket);
        $paket->update($request->all());
        
    	// mengirim data pegawai ke view index
    	return redirect()->route('paket');
 
    }

    public function deletepaket($id_paket)
    {
    	// mengambil data dari table pegawai
        $paket = Paket::find($id_paket);
        $paket->delete();
        
    	// mengirim data pegawai ke view index
    	return redirect()->route('paket');
 
    }

   
}
