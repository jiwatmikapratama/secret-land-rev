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
                    <h2>Data Desa</h2>

                </div>

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @elseif(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @else
                @endif

                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Desa</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Daerah</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($DesaList as $data)
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>
                                    <img src="{{ asset('daerah/' . $data->gambar) }}"
                                        style="max-height: 50px; max-width: 50px;" alt="">
                                </td>
                                <td>{{ $data->kabupaten->nama }}</td>
                                <td >
                                    <div style="max-height: 120px; max-width: 600px; overflow:hidden; white-space: normal;">{{ $data->deskripsi }}</div></td>
                                <td >
                                    <div style="max-height: 120px; max-width: 300px; overflow:hidden; white-space: normal;">{{ $data->address }}</div></td>
                                <td>
                                    <div class="badge {{ $data->status == 'pending' ? 'bg-warning' : 'bg-success' }} "
                                        style="color: {{ $data->status == 'pending' ? 'black' : 'white' }} ;">{{ $data->status }}</div>

                                </td>
                                <td>
                                    <a class="btn btn-success" href="/dashboard/desa/approve/{{ $data->id }}"
                                        onclick="return confirm('Anda yakin ingin menyetujui?');">approve</a>
                                    <a class="btn btn-warning" href="/dashboard/desa-edit/{{ $data->id }}">edit</a>
                                    <a class="btn btn-danger" href="/dashboard/desa/{{ $data->id }}"
                                        onclick="return confirm('Anda yakin ingin menghapus?');">delete</a>
                                </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <hr>
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h2>Data Wisata</h2>
                </div>



                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Wisata</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Desa</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($WisataList as $item)
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>
                                    {{-- @dd($item->gambar) --}}
                                    {{-- @if (is_array($item->gambar) || is_object($item->gambar)) --}}
                                    @foreach (json_decode($item->gambar) as $image)
                                        <img src="{{ asset('/wisata/' . $image) }}"
                                            style="max-height: 50px; max-width: 50px;" alt="multiple image"
                                            class="w-20 h-20 border border-blue-600">
                                    @endforeach
                                    {{-- @endif --}}

                                </td>
                                <td>{{ $item->desa->nama }}</td>
                                <td >
                                    <div style="max-height: 120px; max-width: 600px; overflow:hidden; white-space: normal;">{{ $item->deskripsi }}</div></td>
                                <td >
                                   <div style="max-height: 120px; max-width: 300px; overflow:hidden; white-space: normal;"> {{ $item->address }}</div></td>
                                <td>
                                    <div class="badge {{ $item->status == 'pending' ? 'bg-warning' : 'bg-success' }} "
                                        style="color: {{ $item->status == 'pending' ? 'black' : 'white' }} ;">{{ $item->status }}</div>

                                </td>
                                <td>
                                    <a class="btn btn-success" href="/dashboard/wisata/approve/{{ $item->id }}"
                                        onclick="return confirm('Anda yakin ingin menyetujui?');">approve</a>
                                    <a class="btn btn-warning" href="/dashboard/wisata-edit/{{ $item->id }}">edit</a>
                                    <a class="btn btn-danger" href="/dashboard/wisata/{{ $item->id }}"
                                        onclick="return confirm('Anda yakin ingin menghapus?');">delete</a>
                                </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endsection
