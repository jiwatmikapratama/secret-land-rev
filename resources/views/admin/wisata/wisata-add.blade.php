@extends('layouts.admin.admin-main')

@section('content')
    <br>
    <br>
    <br>
    <div class="container-fluid">
        <div class="row">
            @include('partials.admin.sidebar-admin')
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h2>Tambah Data Wisata</h2>
                </div>

                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    <form method="POST" action="wisat" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>Nama Wisata</label>
                                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                                name="nama" value="{{ old('nama') }}" required>

                                            @error('nama')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label>Gambar</label>
                                            <input type="file" class="form-control @error('gambar') is-invalid @enderror"
                                                name="gambar" value="{{ old('gambar') }}" required>
                                            @error('gambar')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label>Desa</label>
                                            <select id="fk_id_desa"
                                                class="form-control @error('fk_id_desa') is-invalid @enderror"
                                                name="fk_id_desa" required>
                                                <option value="{{ old('fk_id_desa') }}">--Pilih--</option>

                                                @foreach ($DesaList as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                @endforeach
                                            </select>
                                            @error('fk_id_kabupaten')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label>Deskripsi</label>
                                            <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" cols="30" rows="10"
                                                required>{{ old('deskripsi') }}</textarea>
                                            @error('deskripsi')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <input type="text"
                                                class="form-control @error('address') is-invalid @enderror" name="address"
                                                value="{{ old('address') }}" required>

                                            @error('address')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <br>
                                        <br><br>
                                        <div class="form-group">
                                            <button class="btn btn-primary" type="submit">Simpan</button>
                                            <a href="/dashboard" class="btn btn-secondary">Batal</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endsection
