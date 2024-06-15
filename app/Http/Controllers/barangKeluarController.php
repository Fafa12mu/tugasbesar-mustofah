<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\bkeluar;
use App\barang;

class barangKeluarController extends Controller
{
    public function barangkeluar(){
        $barang = bkeluar::orderBy('id', 'desc')->get();
        return view('barangkeluar', ['barang' => $barang]);
    }

    public function adddatak(Request $request){
        // return $request;
        // exit;
        $nama_file = time().'-'.$request->file('gbk')->getClientOriginalName();
        // menyimpan file kedalam folder 
        $path = $request->file('gbk')->storeAs('gbk',$nama_file,'public');
        $total = $request->jbk * $request->hbk;
        $penambah = $request-> jbk;
        bkeluar::create([
            'kdbk' => $request -> kdbk,
            'nmbk' => $request -> nmbk,
            'hbk' => $request-> hbk,
            'jbk' => $request-> jbk,
            'kasir' => $request-> kasir,
            'totalh' => $total,
            'gbk' => $path
            ]);
            $barang = barang::where('kdbarang', $request->kdbm)->first();
            if ($barang) {
                $barang->stckbrg -= $request->jbk; // Menambah stok dengan jumlah barang masuk
                $barang->save();
            }
        
            return redirect('/barangkeluar')->with('alert','Data berhasil ditambahkan');
    }

    public function editdatak(Request $request, $id){
        $barang = bkeluar::find($id);
        $barang->kdbk = $request->kdbk;
        $barang->nmbk = $request->nmbk;
        $barang->hbk = $request->hbk;
        $barang->jbk = $request->jbk;
        $barang->kasir = $request->kasir;

        $total = $request->jbk * $request->hbk;
        $barang->totalh = $request->$total;
        
        // $barang-> poster = $request->poster;
        
        if($request->gbk){
            if($barang->gbk){
                \Storage::disk('public')->delete($barang->gbk);
            }
            $nama_file = time().'-'.$request->file('gbk')->getClientOriginalName();
            // menyimpan file kedalam folder 
            $path = $request->file('gbk')->storeAs('gbk',$nama_file,'public');
            $barang->gbm = $path;    
        }
        $barang->save();
        return redirect('/barangkeluar')->with('alert', 'Data berhasil diedit');
    }

    public function hapusdbk($id){
        $barang = bkeluar::find($id);
        if ($barang->gbk) {
            \Storage::disk('public')->delete($barang->gbk);
        }
        $barang->delete();
        return redirect('/barangkeluar')->with('alert', 'Data berhasil dihapus');
    }
}
