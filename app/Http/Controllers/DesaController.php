<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Kabupaten;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $desas = Desa::paginate(10);
        return response()->json(['data' => $desas]);
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
            return redirect()->route('dashboard-index')->with(['success' => 'Data Desa Berhasil Ditambahkan!']);
        } else {
            return redirect()->route('dashboard-index')->with(['error' => 'Data Desa Gagal Ditambahkan!']);
        }

        // API
        return response()->json(['data' => $desas]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $desas = Desa::paginate(10);

        // API
        return response()->json(['data' => $desas]);
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
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'fk_id_kabupaten' => 'required',
            'deskripsi' => 'required|string|min:50',
            'address' => 'required|string',
            'status' => 'required'
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
        $desas->address = $request->address;
        $desas->status = $request->status;
        $desas->save();

        if ($desas) {
            return redirect()->route('dashboard-index')->with(['success' => 'Data Desa Berhasil Diubah!']);
        } else {
            return redirect()->route('dashboard-index')->with(['error' => 'Data Desa Gagal Diubah!']);
        }

        // API
        return response()->json(['data' => $desas]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $desas = DB::table('desas')->where('id', $id)->get();

        if ($desas[0]->fk_id_kabupaten) {
            Storage::delete('daerah/' . $desas[0]->fk_id_kabupaten);
        }
        if (DB::table('desas')->where('id', $id)->delete()) {
            return redirect()->route('dashboard-index')->with(['success' => 'Data Desa Berhasil Dihapus!']);
            // API
            return response()->json(['massege' => 'desa deleted!']);
        }
    }

    public function approve($id)
    {
        DB::table('desas')->where('id', $id)->update(['status' => 'approve']);
        return redirect()->route('dashboard-index')->with(['success' => 'Data Desa Disetujui!']);
    }
}
