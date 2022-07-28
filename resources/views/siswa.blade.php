@extends('layouts.master')

@section('main')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Siswa</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
            integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />

    </head>

    <body>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Siswa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action={{ url('/koperasi-siswa') }} method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Nama</label>
                                <input type="text" name="nama" class="form-control" id="formGroupExampleInput"
                                    placeholder="Masukkan Nama">
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Jenis Kelamin</label>
                                <input type="text" name="kelamin" class="form-control" id="formGroupExampleInput"
                                    placeholder="Masukkan Jenis Kelamin">
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput2" class="form-label">Nisn</label>
                                <input type="number" name="nisn" class="form-control" id="formGroupExampleInput"
                                    placeholder="Masukkan Nisn">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- DELETE --}}
        @foreach ($data as $dataSiswa)
            <div class="modal fade" id="delete{{ $dataSiswa->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        {{-- <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div> --}}
                        <form action={{ url('/koperasi-siswa/' . $dataSiswa->id) }} method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('DELETE')
                            <div class="modal-body">
                                <center class="mt-3">
                                    <h5>
                                        apakah anda yakin ingin menghapus data ini?
                                    </h5>
                                </center>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                <button type="submit" class="btn btn-danger">Hapus!</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
        {{-- DELETE --}}

        <section>
            <div class="container mt-5">
                <div class="row">
                    <div class="col-lg-8">
                        <h1>Data Siswa</h1>
                    </div>
                </div>


                <div class="row">
                    <div class="col-12 col-md-2">
                        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Tambah Data
                        </button>
                    </div>

                    <div class="col-12 col-md-2">
                        <form action="{{ url('/koperasi-siswa/filter') }}">
                            <span>
                                <select class="form-select" aria-label="Filtering" name="filter">
                                    <option value="Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            

                                <button class="btn btn-primary" type="submit">Filter</button>
                            </span>

                        </form>
                    </div>

                    <div class="col-12 col-md-8">
                        <form class="d-flex" role="search" method="GET" action="{{ url('/koperasi-siswa/search') }}">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                                name="cari">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>



                </div>


                <div class="col-lg-12 mt-5">
                    <table class="table table-hover">
                        <tr>
                            <th>No</th>
                            <form action={{ url('/koperasi-siswa/sort') }} method="GET">
                                <th style="text-align: center;" class="name-hover">
                                    Nama
                                    <span>
                                        <button name="sort" value="ASC">
                                            <i class="fa-solid fa-caret-up"></i>
                                        </button>
                                    </span>
                                    <span>
                                        <button name="sort" value="DESC">
                                            <i class="fa-solid fa-caret-down"></i>
                                        </button>
                                    </span>
                                    {{-- <span>
                                            <button name="sort" value="DESC">
                                                <i class="fa-solid fa-carpet-up"></i>
                                            </button>
                                        </span> --}}
                                </th>
                            </form>
                            <th>Jenis Kelamin</th>
                            <th>Nisn</th>
                            <th>Aksi</th>
                        </tr>
                        @foreach ($data as $dataSiswa)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $dataSiswa->nama }}</td>
                                <td>{{ $dataSiswa->kelamin }}</td>
                                <td>{{ $dataSiswa->nisn }}</td>
                                <td>
                                    <a href="{{ url('/show/' . $dataSiswa->id) }}"
                                        class="btn shadow btn-outline-success btn-sm">Edit</a>
                                    <a class="btn shadow btn-outline-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#delete{{ $dataSiswa->id }}">delete</i></a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            </div>
        </section>



    </body>

    </html>
@endsection
