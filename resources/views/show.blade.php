@extends('layouts.master')

@section('main')
    <section>
        <div class="container mt-5">
            <h1>Edit Siswa</h1>
            <div class="row">
                <div class="col-lg-8">
                    <form action="{{ url('/update/' . $data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama *</label>
                            <input type="text" name="nama" class="form-control" placeholder="Doni Sulaiman"
                                value="{{ $data->nama }}">
                        </div>
                        <div class="form-group">
                            <label for="nama">Jenis Kelamin *</label>
                            <input type="text" name="kelamin" class="form-control" placeholder="Jenis Kelamin"
                                value="{{ $data->kelamin }}">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nisn *</label>
                            <input type="number" name="nisn" class="form-control"
                                placeholder="201902"value="{{ $data->nisn }}">
                        </div>

                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-primary">Tambah Nama Siswa</button>
                        </div>

                        <div class="form-group mt-2">
                            <a href="{{ url('/koperasi-siswa') }}">
                                << Kembali </a>
                        </div>
                    </form>
    </section>
@endsection
