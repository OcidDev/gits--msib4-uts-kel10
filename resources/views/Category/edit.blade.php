@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col-md-12">
        <h2>Edit Category</h2>
        <br>
        <a href="{{ url('Category') }}" class="btn btn-secondary"><--Kembali</a>
        <form action="{{ route('kategori.update',$data->id) }}" method="post">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="nama_Category">Nama Category</label>
                <input type="text" class="form-control" value="{{$data->nama_category}}" name="nama_category" placeholder="Masukkan Nama Category">
            </div>
            <input type="submit" value="Simpan" class="btn btn-md btn-success">
        </form>
    </div>
</div>
@endsection