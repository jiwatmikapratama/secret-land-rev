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
        $wisatas = Wisata::orderBy('created_at', 'desc')->simplePaginate(4);
        $desas = Desa::orderBy('created_at', 'desc')->get();
        $kabupatens = Kabupaten::all();

        return view('beranda.index', ['DesaList' => $desas, 'WisataList' => $wisatas, 'KabupatenList' => $kabupatens, 'title' => 'Beranda', 'keyword' => '']);
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
        $desas = Desa::all();
        if ($request->has('search')) {
            $wisatas = Wisata::where('nama', 'LIKE', '%' . $request->search . '%')->get();
        } else {
            $wisatas = Wisata::all();
        }
        return view('beranda.beranda-search', ['WisataList' => $wisatas, 'DesaList' => $desas, 'KabupatenList' => $kabupatens, 'title' => 'Hasil Pencarian Terkait', 'keyword' => $request->search]);
    }

    public function filter(Request $request)
    {
        $kabupatens = Kabupaten::all();
        if ($request->has('kabupaten_filter')) {
            $desas = Desa::where('fk_id_kabupaten', $request->kabupaten_filter)->get();
        } else {
            $desas = Desa::all();
        }
        return view('beranda.beranda-search', ['DesaList' => $desas, 'KabupatenList' => $kabupatens, 'title' => 'Hasil Pencarian Terkait', 'keyword' => $request->search]);
    }

    public function kabupaten(Request $request, $id)
    {
        $kabupatens = Kabupaten::with(['desa'])->findOrFail($id);
        return view('beranda.index', ['KabupatenList' => $kabupatens, 'title' => 'Beranda']);
    }
}
