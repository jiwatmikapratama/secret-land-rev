@extends('layouts.user.user-main')

@section('content')
    @include('partials.break')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h2>Tambah Data Wisata</h2>
        </div>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="daftar-wisata" enctype="multipart/form-data">
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
                                        name="gambar[]" multiple value="{{ old('gambar') }}" required>
                                    @error('gambar')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <br>
                                <div class="form-group">
                                    <label>Desa</label>
                                    <select id="fk_id_desa" class="form-control @error('fk_id_desa') is-invalid @enderror"
                                        name="fk_id_desa" required>
                                        <option value="{{ old('fk_id_desa') }}">--Pilih--</option>

                                        @foreach ($DesaList as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('fk_id_kabupaten')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div><br>
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select id="fk_id_kategori"
                                        class="form-control @error('fk_id_kategori') is-invalid @enderror"
                                        name="fk_id_kategori" required>
                                        <option value="{{ old('fk_id_kategori') }}">--Pilih--</option>

                                        @foreach ($KategoriList as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('fk_id_kategori')
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
                                    <input type="text" class="form-control @error('address') is-invalid @enderror"
                                        name="address" value="{{ old('address') }}" required>

                                    @error('address')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group d-none">
                                    <label>Status</label>
                                    <select id="status" class="form-control @error('status') is-invalid @enderror"
                                        name="status">
                                        <option value="{{ old('status') }}">--Pilih--</option>
                                        <option value="approve">Disetujui</option>
                                        <option value="pending" selected>Dalam Proses</option>
                                    </select>
                                    @error('status')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <br>
                                <br><br>
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">Simpan</button>
                                    <a href="/beranda" class="btn btn-secondary">Batal</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
