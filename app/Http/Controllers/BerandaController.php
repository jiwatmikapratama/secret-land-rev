<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Kabupaten;
use App\Models\Kategori;
use App\Models\Wisata;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wisatas = Wisata::orderBy('created_at', 'desc')->where('status', 'approve')->simplePaginate(4);
        $desas = Desa::orderBy('created_at', 'desc')->where('status', 'approve')->simplePaginate(4);
        $kategoris = Kategori::all();
        $kabupatens = Kabupaten::all();

        return view('beranda.index', ['DesaList' => $desas, 'WisataList' => $wisatas, 'KabupatenList' => $kabupatens, 'KategoriList' => $kategoris, 'title' => 'Beranda', 'keyword' => '']);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $desas = Desa::with(['wisata'])->findOrFail($id);
        return view('beranda.beranda-detail', ['DesaList' => $desas, 'title' => 'Beranda']);
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

    public function search(Request $request)
    {
        $kabupatens = Kabupaten::all();
        // $desas = Desa::all();
        $desas = Desa::orderBy('created_at', 'desc')->simplePaginate(4);
        $kategoris = Kategori::all();
        if ($request->has('search')) {
            $wisatas = Wisata::where('nama', 'LIKE', '%' . $request->search . '%')->get();
        } else {
            $wisatas = Wisata::orderBy('created_at', 'desc')->simplePaginate(4);
        }
        return view('beranda.beranda-search', ['WisataList' => $wisatas, 'DesaList' => $desas, 'KabupatenList' => $kabupatens, 'KategoriList' => $kategoris, 'title' => 'Hasil Pencarian Terkait', 'keyword' => $request->search]);
    }

    public function filter($id)
    {
        // $wisatas = Wisata::with(['kategori'])->findOrFail($id);
        // $kategoris = Kategori::all();

        $wisatas = Wisata::orderBy('created_at', 'desc')->where('status', 'approve')->where('fk_id_kategori', $id)->simplePaginate(4);
        $kategoris = Kategori::all();
        return view('beranda.beranda-kategori-wisata', ['WisataList' => $wisatas, 'KategoriList' => $kategoris, 'title' => 'Kategori']);
    }

    // public function kabupaten(Request $request, $id)
    // {
    //     $kabupatens = Kabupaten::with(['desa'])->findOrFail($id);
    //     return view('beranda.index', ['KabupatenList' => $kabupatens, 'title' => 'Beranda']);
    // }
}
