<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class mahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = mahasiswa::orderBy('nim','asc')->paginate();
        return view('mahasiswa.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('nim,$request->nim');
        Session::flash('nama,$request->nama');
        Session::flash('kendaraan,$request->kendaraan');

        $request->validate([
            'nim' => 'required|numeric|unique:mahasiswa,nim',
            'nama' => 'required',
            'kendaraan' => 'required',
        ],[
            'nim.required'=>'NIM wajib diisi',
            'nim.numeric'=>'NIM wajib berupa angka',
            'nim.unique'=>'NIM sudah terdaftar',
            'nama.required'=>'Nama wajib diisi',
            'kendaraan.required'=>'Kendaraan wajib diisi',
        ]);
        $data = [
            'nim' => $request->nim,
            'nama' => $request->nama,
            'kendaraan' => $request->kendaraan,
        ];
        mahasiswa::create($data);
          return redirect()->to('mahasiswa')->with('success','Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
$data = mahasiswa::where('nim',$id)->first();
return view('mahasiswa.edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'kendaraan' => 'required',
        ],[
            'nama.required'=>'Nama wajib diisi',
            'kendaraan.required'=>'Kendaraan wajib diisi',
        ]);
        $data = [
            'nama' => $request->nama,
            'kendaraan' => $request->kendaraan,
        ];
        mahasiswa::where('nim',$id)->update($data);
          return redirect()->to('mahasiswa')->with('success','Berhasil merubah data');    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       mahasiswa::where('nim',$id)->delete();
       return redirect()->to('mahasiswa')->with('success','Berhasil menghapus data');    
    }
}
