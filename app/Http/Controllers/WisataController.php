<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class WisataController extends Controller
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
        $desas = Desa::select('id', 'nama')->get();
        return view('admin.wisata.wisata-add', ['DesaList' => $desas, "title" => "Tambah Wisata",]);
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
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'fk_id_desa' => 'required',
            'deskripsi' => 'required|string|min:50',
            'address' => 'required|string|max:100',
        ]);

        $nm = $request->gambar;
        $nameFile = $nm->getClientOriginalName();

        $wisatas = new Wisata;
        $wisatas->nama = $request->nama;
        $wisatas->gambar = $nameFile;

        $nm->move(public_path() . '/wisata', $nameFile);
        $wisatas->fk_id_desa = $request->fk_id_desa;
        $wisatas->deskripsi = $request->deskripsi;
        $wisatas->address = $request->address;
        $wisatas->save();


        if ($wisatas) {
            return redirect()->route('dashboard-index')->with(['success' => 'Data Wisata Berhasil Ditambahkan!']);
        } else {
            return redirect()->route('dashboard-index')->with(['error' => 'Data Wisata Gagal Ditambahkan!']);
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
        $wisatas = Wisata::with('desa')->findOrFail($id);
        $desas = Desa::where('id', '!=', $wisatas->fk_id_desa)->get(['id', 'nama']);
        return view('admin.wisata.wisata-edit', ['WisataList' => $wisatas, 'DesaList' => $desas, "title" => "Edit Wisata",]);
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
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'fk_id_desa' => 'required',
            'deskripsi' => 'required|string|min:50',
            'address' => 'required|string|max:100',
        ]);

        $wisatas = Wisata::with('desa')->findOrFail($id);
        $nm = $request->gambar;
        $nameFile = $nm->getClientOriginalName();

        $wisatas->nama = $request->nama;
        $wisatas->gambar = $nameFile;

        $nm->move(public_path() . '/wisata', $nameFile);
        $wisatas->fk_id_desa = $request->fk_id_desa;
        $wisatas->deskripsi = $request->deskripsi;
        $wisatas->address = $request->address;
        $wisatas->save();

        if ($wisatas) {
            return redirect()->route('dashboard-index')->with(['success' => 'Data Wisata Berhasil Diubah!']);
        } else {
            return redirect()->route('dashboard-index')->with(['error' => 'Data Wisata Gagal Diubah!']);
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
        $wisatas = DB::table('objek_wisatas')->where('id', $id)->get();

        if ($wisatas[0]->fk_id_desa) {

            Storage::delete('/wisata/' . $wisatas[0]->fk_id_desa);
        }
        if (DB::table('objek_wisatas')->where('id', $id)->delete()) {
            return redirect()->route('dashboard-index')->with(['success' => 'Data Wisata Berhasil Dihapus!']);
        }
    }
}
