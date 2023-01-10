<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\DesaDidaftarkan;
use App\Models\Kabupaten;
use App\Models\Kategori;
use App\Models\Wisata;
use App\Models\WisataDidaftarkan;
use Illuminate\Http\Request;

class UserController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeDesa(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|max:20',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'fk_id_kabupaten' => 'required',
            'deskripsi' => 'required|string|min:50',
            'address' => 'required|string',
            'status' => 'required'
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
        $desas->status = $request->status;
        $desas->save();

        if ($desas) {
            return redirect()->route('beranda-index')->with(['success' => 'Data Desa Berhasil Ditambahkan!']);
        } else {
            return redirect()->route('beranda-index')->with(['error' => 'Data Desa Gagal Ditambahkan!']);
        }

        // API
        return response()->json(['data' => $desas]);
    }

    public function storeWisata(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|max:20',
            'gambar' => 'required',
            'gambar.*' => 'image|max:2048',
            'fk_id_desa' => 'required',
            'fk_id_kategori' => 'required',
            'deskripsi' => 'required|string|min:50',
            'address' => 'required|string',
            'status' => 'required'
        ]);

        if ($request->hasfile('gambar')) {

            foreach ($request->file('gambar') as $image) {
                $name = $image->getClientOriginalName();
                $image->move(public_path() . '/wisata/', $name);
                $data[] = $name;
            }
        }

        $wisatas = new Wisata;
        $wisatas->nama = $request->nama;
        $wisatas->gambar = json_encode($data);

        $wisatas->fk_id_desa = $request->fk_id_desa;
        $wisatas->fk_id_kategori = $request->fk_id_kategori;
        $wisatas->deskripsi = $request->deskripsi;
        $wisatas->address = $request->address;
        $wisatas->status = $request->status;
        $wisatas->save();

        if ($wisatas) {
            return redirect()->route('beranda-index')->with(['success' => 'Data Wisata Berhasil Didaftarkan!']);
        } else {
            return redirect()->route('beranda-index')->with(['error' => 'Data Wisata Gagal Didaftarkan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function createDesa()
    {
        $kabupatens = Kabupaten::all();
        return view('beranda.beranda-daftar-desa', ['KabupatenList' => $kabupatens, 'title' => 'Daftarkan Desa']);
    }

    public function createWisata()
    {
        $desas = Desa::select('id', 'nama')->get();
        $kategoris = Kategori::select('id', 'nama')->get();
        return view('beranda.beranda-daftar-wisata', ['DesaList' => $desas, 'KategoriList' => $kategoris, 'title' => 'Daftarkan Wisata']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
