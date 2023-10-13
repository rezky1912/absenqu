<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class DivisiController extends Controller
{
    public function index(Request $request)
    {
        $nama_div = $request->nama_div;
        $query = Divisi::query();
        $query->select('*');
        if (!empty($nama_div)) {
            $query->where('nama_div', 'like', '%'.$nama_div.'%');
        }
        $divisi = $query->get();
        // $divisi = DB::table('divisi')->orderBy('kode_div')->get();

        return view('divisi.index', compact('divisi'));
    }

    public function store(Request $request)
    {
        $kode_div = $request->kode_div;
        $nama_div = $request->nama_div;
        $data = [
            'kode_div' => $kode_div,
            'nama_div' => $nama_div,
        ];
        $cek = DB::table('divisi')->where('kode_div', $kode_div)->count();
        if ($cek > 0) {
            return Redirect::back()->with(['warning' => 'Data dengan kode div.'.$kode_div.'Sudah Ada']);
        }

        $simpan = DB::table('divisi')->insert($data);
        if ($simpan) {
            return Redirect::back()->with(['success' => 'Data Berhasil Disimpan']);
        } else {
            return Redirect::back()->with(['Warning' => 'Data Gagal Disimpan']);
        }
    }

    public function edit(Request $request)
    {
        $kode_div = $request->kode_div;
        $divisi = DB::table('divisi')->where('kode_div', $kode_div)->first();

        return view('divisi.edit', compact('divisi'));
    }

    public function update($kode_div, Request $request)
    {
        $nama_div = $request->nama_div;
        $data = [
            'nama_div' => $nama_div,
        ];
        $update = DB::table('divisi')->where('kode_div', $kode_div)->update($data);
        if ($update) {
            return Redirect::back()->with(['success' => 'Data Berhasil Diupdate']);
        } else {
            return Redirect::back()->with(['warning' => 'Data Gagal Diupdate']);
        }
    }

    public function delete($kode_div)
    {
        $hapus = DB::table('divisi')->where('kode_div', $kode_div)->delete();
        if ($hapus) {
            return Redirect::back()->with(['success' => 'Data Berhasil Dihapus']);
        } else {
            return Redirect::back()->with(['warning' => 'Data Gagal Dihapus']);
        }
    }
}
