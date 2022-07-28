@extends('layouts.master')

@section('main')
    <section>
        <div class="container mt-5">
            <h1>Tambah Seragam</h1>
            <div class="row">
                <div class="col-lg-8">
                    <form action="{{ url('/store-seragam') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- <div class="form-group">
                            <label for="nama">Jenis *</label>
                            <input type="text" name="nama" class="form-control" placeholder="Batik">
                        </div>
                        <div class="form-group">
                            <label for="nama">Ukuran *</label>
                            <input type="text" name="ukuran" class="form-control" placeholder="XL">
                        </div> --}}
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Jenis Baju</label>
                            <input type="text" name="nama" class="form-control" id="formGroupExampleInput"
                                placeholder="Masukkan Jenis Baju">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Ukuran Baju</label>
                            <input type="text" name="ukuran" class="form-control" id="formGroupExampleInput2"
                                placeholder="Masukkan Ukuran Baju">
                        </div>

                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-primary">Tambah Seragam</button>
                        </div>

                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-primary">Tambah Seragam</button>
                        </div>

                        <div class="form-group mt-2">
                            <a href="{{ url('/koperasi-seragam') }}">
                                << Kembali </a>
                        </div>

                       
                    </form>
    </section>
@endsection
