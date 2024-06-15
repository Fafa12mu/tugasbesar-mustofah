<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\bmasuk;
use App\barang;
use Illuminate\Support\Facades\Storage;

class barangMasukController extends Controller
{
    public function barangmasuk(){
        $barang = bmasuk::orderBy('id', 'desc')->get();
        return view('barangmasuk', ['barang' => $barang]);
    }

    public function adddata(Request $request){
        $nama_file = time().'-'.$request->file('gbm')->getClientOriginalName();
        // menyimpan file kedalam folder 
        $path = $request->file('gbm')->storeAs('gbm',$nama_file,'public');
        bmasuk::create([
            'kdbm' => $request -> kdbm,
            'nmbm' => $request -> nmbm,
            'hbm' => $request-> hbm,
            'jbm' => $request-> jbm,
            'pengirim' => $request-> pengirim,
            'penerima' => $request-> penerima,
            'gbm' => $path
            ]);

            $barang = barang::where('kdbarang', $request->kdbm)->first();
            if ($barang) {
                $barang->stckbrg += $request->jbm; // Menambah stok dengan jumlah barang masuk
                $barang->save();
            }

            return redirect('/barangmasuk')->with('alert','Data berhasil ditambahkan');
    }

    public function editdata(Request $request, $id){
        $barang = bmasuk::find($id);
        $barang->kdbm = $request->kdbm;
        $barang->nmbm = $request->nmbm;
        $barang->hbm = $request->hbm;
        $barang->jbm = $request->jbm;
        $barang->pengirim = $request->pengirim;
        $barang->penerima = $request->penerima;
        // $barang-> poster = $request->poster;
        
        if($request->gbm){
            if($barang->gbm){
                \Storage::disk('public')->delete($barang->gbm);
            }
            $nama_file = time().'-'.$request->file('gbm')->getClientOriginalName();
            // menyimpan file kedalam folder 
            $path = $request->file('gbm')->storeAs('gbm',$nama_file,'public');
            $barang->gbm = $path;    
        }
        $barang->save();
        return redirect('/barangmasuk')->with('alert', 'Data berhasil diedit');
    }

    public function hapusdbm($id){
        $barang = bmasuk::find($id);
        if ($barang->gbm) {
            \Storage::disk('public')->delete($barang->gbm);
        }
        $barang->delete();
        return redirect('/barangmasuk')->with('alert', 'Data berhasil dihapus');
    }
}
