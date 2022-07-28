@extends('layouts.master')

@section('main')
    <section>
        <div class="container mt-5">
            <h1>Tambah Siswa</h1>
            <div class="row">
                <div class="col-lg-8">
                    <form action="{{ url('/store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama *</label>
                            <input type="text" name="nama" class="form-control" placeholder="Doni Sulaiman">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nisn *</label>
                            <input type="number" name="nisn" class="form-control" placeholder="201902">
                        </div>

                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-primary">Tambah Nama Siswa</button>
                        </div>

                        <div class="form-group mt-2">
                            <a href="{{ url('/koperasi-siswa') }}">
                                << Kembali 
                            </a>
                        </div>
                    </form>
    </section>
@endsection