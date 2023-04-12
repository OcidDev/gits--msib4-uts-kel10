@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col-md-12">
        <h2>Halaman Daftar Category</h2>
        <br>
        <a href="{{ url('produk') }}" class="btn btn-secondary"><--Kembali</a>
        <a href="kategori/create" class="btn btn-md btn-success">Tambah Category</a>

        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Category</th>
                <th scope="col">Option</th>
              </tr>
            </thead>
            <tbody>
                @php
                  $nomor = 1;
                @endphp
                @foreach ($data as $dt)
                    <tr>
                      <th scope="row">{{ $nomor++ }}</th>
                        <td>
                            {{$dt->nama_category}}
                        </td>
                      <td>
                        <form action="/kategori/{{$dt->id}}" method="post">
                            @csrf
                            @method('DELETE')
                            <a href="/kategori/{{$dt->id}}/edit" class="btn btn-md btn-warning mr-2">Edit</a>
                            <input class="btn btn-md btn-danger" type="submit" value="Hapus">
                        </form>
                      </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
    </div>
</div>
@endsection