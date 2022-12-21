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
                    <form class="d-flex ms-auto">
                        <input class="form-control me-1" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-dark" type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>



                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Desa</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Daerah</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            {{-- @foreach ($DashboardList as $data)
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->name }}</td>
                                <td>
                                    <img src="{{ asset('daerah/' . $data->gambar) }}"
                                        style="max-height: 50px; max-width: 50px;" alt="">
                                </td>
                                <td>{{ $data->daerah['nama'] }}</td>
                                <td>{{ $data->deskripsi }}</td>
                                <td>{{ $data->address }}</td>
                                <td><a class="btn btn-warning" href="dashboard-edit/{{ $data->id }}">edit</a>
                                    <a class="btn btn-danger" href="/dashboard/{{ $data->id }}">delete</a>
                                </td>
                        </tr>
                        @endforeach --}}
                    </tbody>
                </table>
                <hr>
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h2>Data Wisata</h2>
                    <form class="d-flex ms-auto">
                        <input class="form-control me-1" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-dark" type="submit"><i class="fa fa-search"></i></button>
                    </form>
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
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            {{-- @foreach ($DetailList as $item)
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <img src="{{ asset('daerah/' . $item->gambar) }}"
                                        style="max-height: 50px; max-width: 50px;" alt="">
                                </td>
                                <td>{{ $item->dashboard['name'] }}</td>
                                <td>{{ $item->deskripsi }}</td>
                                <td>{{ $item->address }}</td>
                                <td><a class="btn btn-warning" href="detail-edit/{{ $item->id }}">edit</a>
                                    <a class="btn btn-danger" href="/detail/{{ $item->id }}">delete</a>
                                </td>
                        </tr>
                        @endforeach --}}
                    </tbody>
                </table>
            @endsection
