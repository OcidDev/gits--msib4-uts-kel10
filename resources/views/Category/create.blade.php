@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col-md-12">
        <h2>Tambah Category</h2>
        <br>
        <a href="{{ route('kategori.index') }}" class="btn btn-secondary"><--Kembali</a>
        <form action="{{ route('kategori.store') }}" method="POST">
            @csrf
            @method('post')
            <div class="mb-3">
                <label for="nama_category">Nama Category</label>
                <input type="text" class="form-control" name="nama_category" placeholder="Masukkan Nama Category">
            </div>
            <input type="submit" value="Simpan" class="btn btn-md btn-success">
        </form>
    </div>
</div>
@endsection