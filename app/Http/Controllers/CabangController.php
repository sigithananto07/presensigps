<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CabangController extends Controller
{
    public function index()
    {
        $cabang = DB::table('cabang')->orderBy('kode_cabang')->get();
        return view('cabang.index', compact('cabang'));
    }

    public function store(Request $request) 
    {
        $kode_cabang = $request->kode_cabang;
        $nama_cabang = $request->nama_cabang;
        $lokasi_cabang = $request->lokasi_cabang;
        $radius_cabang = $request->radius_cabang;

        try {
            $data = [
                'kode_cabang' => $kode_cabang,
                'nama_cabang' => $nama_cabang,
                'lokasi_cabang' => $lokasi_cabang,
                'radius_cabang' => $radius_cabang
            ];
            DB::table('cabang')->insert($data);
            return Redirect::back()->with(['success' => 'Data Berhasil Di Simpan']);

        } catch (Exception $e) {
            return Redirect::back()->with(['warning' => 'Data Gagal Di Simpan']);

        }
    }

    public function edit(Request $request) 
    {
        $kode_cabang = $request->kode_cabang;
        $cabang = DB::table('cabang')->where('kode_cabang', $kode_cabang)->first();
        return view('cabang.edit', compact('cabang'));
    }

    public function update(Request $request) 
        
    {
        $kode_cabang = $request->kode_cabang;
        $nama_cabang = $request->nama_cabang;
        $lokasi_cabang = $request->lokasi_cabang;
        $radius_cabang = $request->radius_cabang;

        try {
            $data = [
                'nama_cabang' => $nama_cabang,
                'lokasi_cabang' => $lokasi_cabang,
                'radius_cabang' => $radius_cabang
            ];
            DB::table('cabang')
            ->where('kode_cabang', $kode_cabang)
            ->update($data);
            return Redirect::back()->with(['success' => 'Data Berhasil Diupdate']);

        } catch (Exception $e) {
            return Redirect::back()->with(['warning' => 'Data Gagal Di Diupdate']);

        }
    }

    public function delete($kode_cabang) {
        $hapus = DB::table('cabang')->where('kode_cabang',$kode_cabang)->delete();
        if($hapus){
           return Redirect::back()->with((['success' => 'Data Berhasil di Hapus']));
         } else {
          return Redirect::back()->with((['warning' => 'Data Gagal di Hapus']));
         } 
   } 

}




