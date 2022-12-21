<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Kabupaten;
use Illuminate\Http\Request;

class DesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kabupatens = Kabupaten::select('id', 'nama')->get();
        return view('admin.desa.desa-add', ['KabupatenList' => $kabupatens, "title" => "Tambah Desa",]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|max:20',
            'gambar' => 'required|image',
            'fk_id_kabupaten' => 'required',
            'deskripsi' => 'required|string|min:50',
            'address' => 'required|string|max:100',
        ]);

        $nm = $request->gambar;
        $nameFile = $nm->getClientOriginalName();

        $desas = new Desa;
        $desas->nama = $request->nama;
        $desas->gambar = $nameFile;

        $nm->move(public_path() . '/daerah', $nameFile);
        $desas->fk_id_kabupaten = $request->fk_id_kabupaten;
        $desas->deskripsi = $request->deskripsi;
        $desas->address = $request->address;
        $desas->save();


        if ($desas) {
            return redirect()->route('dashboard-index')->with(['success' => 'Data Desa Berhasil Ditambahkan!']);
        } else {
            return redirect()->route('dashboard-index')->with(['error' => 'Data Desa Gagal Ditambahkan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $desas = Desa::with('kabupaten')->findOrFail($id);
        $kabupatens = Kabupaten::where('id', '!=', $desas->fk_id_kabupaten)->get(['id', 'nama']);
        return view('admin.desa.desa-edit', ['DesaList' => $desas, 'KabupatenList' => $kabupatens, "title" => "Edit Desa",]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required|max:20',
            'gambar' => 'required|image',
            'fk_id_kabupaten' => 'required',
            'deskripsi' => 'required|string|min:50',
            'address' => 'required|string|max:100',
        ]);

        $desas = Desa::with('kabupaten')->findOrFail($id);
        $nm = $request->gambar;
        $nameFile = $nm->getClientOriginalName();

        $desas->nama = $request->nama;
        $desas->gambar = $nameFile;

        $nm->move(public_path() . '/daerah', $nameFile);
        $desas->fk_id_kabupaten = $request->fk_id_kabupaten;
        $desas->deskripsi = $request->deskripsi;
        $desas->address = $request->address;
        $desas->save();

        if ($desas) {
            return redirect()->route('dashboard-index')->with(['success' => 'Data Desa Berhasil Diubah!']);
        } else {
            return redirect()->route('dashboard-index')->with(['error' => 'Data Desa Gagal Diubah!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
