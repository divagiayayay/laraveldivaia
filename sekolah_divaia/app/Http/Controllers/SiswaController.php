<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::all();
        return view('siswa.index', compact('siswas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|unique:siswas,nis',
            'nama' => 'required',
            'kelas' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        Siswa::create($request->all());
        return redirect()->back()->with('sukses', 'Data siswa berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        Siswa::findOrFail($id)->delete();
        return redirect()->back()->with('sukses', 'Data siswa berhasil dihapus!');
    }
}
