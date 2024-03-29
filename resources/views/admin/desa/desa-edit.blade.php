@extends('layouts.admin.admin-main')

@section('content')
    @include('partials.break')
    <div class="container-fluid">
        <div class="row">
            @include('partials.admin.sidebar-admin')
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h2>Edit Data Desa</h2>
                </div>

                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    <form method="POST" action="/dashboard/desa/{{ $DesaList->id }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label>Nama Desa</label>
                                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                                name="nama" value="{{ $DesaList->nama }}" required>

                                            @error('nama')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label>Gambar</label>
                                            <input type="file" class="form-control @error('gambar') is-invalid @enderror"
                                                name="gambar" value="{{ $DesaList->gambar }}" required>

                                            @error('gambar')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label>Kabupaten</label>
                                            <select id="fk_id_kabupaten"
                                                class="form-control @error('kabupaten') is-invalid @enderror"
                                                name="fk_id_kabupaten" required>
                                                <option value="{{ $DesaList->kabupaten->id }}">
                                                    {{ $DesaList->kabupaten->nama }}</option>
                                                @foreach ($KabupatenList as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                @endforeach
                                            </select>

                                            @error('kabupaten')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label>Deskripsi</label>
                                            <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" cols="30" rows="10"
                                                required>{{ $DesaList->deskripsi }}</textarea>

                                            @error('deskripsi')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <input type="text"
                                                class="form-control @error('address') is-invalid @enderror" name="address"
                                                value="{{ $DesaList->address }}" required>

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
