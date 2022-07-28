@extends('layouts.master')

@section('main')
    <section>
        <div class="container mt-5">
            <h1>Edit Seragam</h1>
            <div class="row">
                <div class="col-lg-8">
                    <form action="{{ url('/update-seragam/' . $data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Jenis *</label>
                            <input type="text" name="nama" class="form-control" placeholder="Batik"
                                value="{{ $data->nama }}">
                        </div>
                        <div class="form-group">
                            <label for="nama">Ukuran *</label>
                            <input type="text" name="ukuran" class="form-control"
                                placeholder=""value="{{ $data->ukuran }}">
                        </div>

                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-primary">Selesai</button>
                        </div>

                        <div class="form-group mt-2">
                            <a href="{{ url('/koperasi-seragam') }}">
                                << Kembali </a>
                        </div>
                    </form>
    </section>
@endsection
