@extends('layout.app')

{{-- Customize layout sections --}}
@section('subtitle', 'Kategori')
@section('content_header_title', 'Kategori')
@section('content_header_subtitle', 'Edit')

{{-- Content body: main page content --}}
@section('content')
<div class="container">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Kategori</h3>
        </div>

        <form method="post" action="{{ route('kategori.update', $kategori->kategori_id) }}">
            @csrf
            @method('PUT') {{-- Method PUT untuk update data --}}

            <div class="card-body">
                <div class="form-group">
                    <label for="kodeKategori">Kode Kategori</label>
                    <input type="text" class="form-control" id="kodeKategori" name="kodeKategori"
                        value="{{ old('kodeKategori', $kategori->kategori_kode) }}" placeholder="Masukkan kode kategori">
                </div>
                <div class="form-group">
                    <label for="namaKategori">Nama Kategori</label>
                    <input type="text" class="form-control" id="namaKategori" name="namaKategori"
                        value="{{ old('namaKategori', $kategori->kategori_nama) }}" placeholder="Masukkan nama kategori">
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="../" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection