<?php

namespace App\Http\Controllers;
use App\Models\Pembayaran;
use App\Models\Users;
use App\Models\Paket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
class PembayaransController extends Controller
{
    public function index()
    {
    	// mengambil data dari table pegawai
        $pembayaran = Pembayaran::with(['Paket', 'User'])->get();
    	// mengirim data pegawai ke view index
    	return view('layout/pembayaran',compact('pembayaran'));
 
    }

    public function tambahpembayaran()
    {
    	// mengambil data dari table pegawai
    	
        $user=Users::all();
        $paket=Paket::all();
    	// mengirim data pegawai ke view index
    	return view('layout/pembayarans',compact('user','paket'));
 
    }

    public function insertdata(Request $request)
    {
       
      // Validasi input
    $request->validate([
        'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // contoh validasi untuk file gambar
        'id_user' => 'required',
        'id_paket' => 'required',
        'total' => 'required',
        'status_bayar' => 'required',
    ]);

    // Simpan foto ke dalam penyimpanan
    $fotoName = time().'.'.$request->foto->extension();  
    $request->foto->move(public_path('images'), $fotoName);

    // Buat entri pembayaran baru dengan data yang diberikan
    Pembayaran::create([
        'id_user' => $request->id_user,
        'id_paket' => $request->id_paket,
        'total' => $request->total,
        'status_bayar' => $request->status_bayar,
        'foto' => $fotoName, // Simpan nama file foto ke dalam database
    ]);
    
    // Redirect ke halaman pembayaran
    return redirect()->route('home');
}
 
    

    public function ubahpembayaran($id_pembayaran)
    {
    	// mengambil data dari table pegawai
        $pembayaran = Pembayaran::find($id_pembayaran);
        $user=Users::all();
        $paket=Paket::all();
 
    	// mengirim data pegawai ke view index
    	return view('layout/ubahpembayaran',compact('pembayaran','user', 'paket'));
 
    }

    public function updatedata(Request $request, $id_pembayaran)
    {
    	// mengambil data dari table pegawai
        $pembayaran = Pembayaran::find($id_pembayaran);
        $pembayaran->update($request->all());
        
    	// mengirim data pegawai ke view index
    	return redirect()->route('pembayaran');
 
    }

    public function deletepembayaran($id_pembayaran)
    {
    	// mengambil data dari table pegawai
        $pembayaran = Pembayaran::find($id_pembayaran);
        $pembayaran->delete();
        
    	// mengirim data pegawai ke view index
    	return redirect()->route('pembayaran');
 
    }

    public function eksporpembayaran()
    {
    	// mengambil data dari table pegawai
        $pembayaran = Pembayaran::with(['Paket', 'User'])->get();
        view()->share('pembayaran',$pembayaran);
        $pdf = PDF::loadview('layout/datapembayaran-pdf');
        return $pdf->download('pembayaran.pdf');
    	// mengirim data pegawai ke view index
    	
 
    }

    
}
