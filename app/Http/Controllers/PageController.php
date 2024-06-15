<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\barang;
use App\ruser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class PageController extends Controller
{
    public function index(){
    $barang  = barang::orderBy('id','desc')->get();
    return view('home',['key' => "barang",'barang'=>$barang, 'br'=>$barang]);
    }

    public function tambahdata(Request $request){
        // mengambail nama file 
        $nama_file = time().'-'.$request->file('gmbrbarang')->getClientOriginalName();
        // menyimpan file kedalam folder 
        $path = $request->file('gmbrbarang')->storeAs('gmbrbarang',$nama_file,'public');
        barang::create([
            'kdbarang' => $request -> kdbarang,
            'namabrg' => $request -> namabrg,
            'hrgbrg' => $request-> hrgbrg,
            'stckbrg' => $request-> stckbrg,
            'gmbrbarang' => $path
            ]);
            return redirect('/index')->with('alert','Data berhasil ditambahkan');
    }

    public function updatedata(Request $request, $id){
        $br = barang::find($id);
        $br-> kdbarang = $request->kdbarang;
        $br-> namabrg = $request->namabrg;
        $br-> hrgbrg = $request->hrgbrg;
        $br-> stckbrg = $request->stckbrg;
        // $barang-> poster = $request->poster;
        
        if($request->gmbrbarang){
            if($br->gmbrbarang){
                \Storage::disk('public')->delete($br->gmbrbarang);
            }
            $nama_file = time().'-'.$request->file('gmbrbarang')->getClientOriginalName();
            // menyimpan file kedalam folder 
            $path = $request->file('gmbrbarang')->storeAs('gmbrbarang',$nama_file,'public');
            $br->gmbrbarang = $path;    
        }
        $br->save();
        return redirect('/index')->with('alert','Data berhasil diedit');    
    }

    public function hapus($id){
        $br = barang::find($id);
        $br->delete();
        \Storage::disk('public')->delete($br->gmbrbarang);
        return redirect('/index')->with('alert','Data berhasil dihapus');
    }

    public function login(){
        return view('login');
    }

    public function edituser(){
        return view('edituser',["key" => ""]);
    }

    public function updateuser(Request $request){
        if($request -> passwordbaru == $request->confirmasipassword){
            $user = Auth::user();
            $user->password = bcrypt($request->passwordbaru);
            $user->save();
            return redirect('/index')->with('alert','Password berhasil diubah');
        }else{
            return redirect('/index')->with('alert','Password gagal diubah');
        }
    }

    public function search(){
        return view('search');
    }

    public function actsearch(Request $request){
        $cari = $request->input('q');
        $barang = barang::where('namabrg', 'LIKE', "%$cari%")->get();
        return view("actsearch", ["data" => $barang]);
        
    }

    public function register(){
        return view('register');
    }

    public function registrasi(Request $request){
        ruser::create([
            'name' => $request->rname,
            'email' => $request->remail,
            'password' => Hash::make($request->rpassword)
        ]);
        return redirect('/')->with('alert','Registrasi Berhasil');
    }
    

}
