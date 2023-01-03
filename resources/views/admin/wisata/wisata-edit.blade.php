@extends('layouts.admin.admin-main')

@section('content')
    @include('partials.break')
    <div class="container-fluid">
        <div class="row">
            @include('partials.admin.sidebar-admin')
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h2>Edit Data Wisata</h2>
                </div>

                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    <form method="POST" action="/dashboard/wisata/{{ $WisataList->id }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label>Nama Wisata</label>
                                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                                name="nama" value="{{ $WisataList->nama }}" required>

                                            @error('nama')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label>Gambar</label>
                                            <input type="file" class="form-control @error('gambar') is-invalid @enderror"
                                                name="gambar[]" multiple value="{{ $WisataList->gambar }}" required>

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
                                                <option value="{{ $WisataList->desa->id }}">
                                                    {{ $WisataList->desa->nama }}</option>
                                                @foreach ($DesaList as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                @endforeach
                                            </select>

                                            @error('desa')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label>Kategori</label>
                                            <select id="fk_id_kategori"
                                                class="form-control @error('fk_id_kategori') is-invalid @enderror"
                                                name="fk_id_kategori" required>
                                                <option value="{{ $WisataList->kategori->id }}">
                                                    {{ $WisataList->kategori->nama }}</option>
                                                @foreach ($KategoriList as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                @endforeach
                                            </select>

                                            @error('kategori')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label>Deskripsi</label>
                                            <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" cols="30" rows="10"
                                                required>{{ $WisataList->deskripsi }}</textarea>

                                            @error('deskripsi')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <input type="text"
                                                class="form-control @error('address') is-invalid @enderror" name="address"
                                                value="{{ $WisataList->address }}" required>

                                            @error('address')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group d-none">
                                            <label>Status</label>
                                            <select id="status"
                                                class="form-control @error('status') is-invalid @enderror" name="status">
                                                <option value="{{ old('status') }}">--Pilih--</option>
                                                <option value="approve" selected>Disetujui</option>
                                                <option value="pending">Dalam Proses</option>
                                            </select>
                                            @error('status')
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
