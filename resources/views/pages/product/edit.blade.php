@extends('layouts.dashboard')
@section('title')
    Edit Product
@endsection

@section('content')

<div class="card" style="margin:20px">
    <div class="card-header"><h3>Edit Product</h3></div>
    <div class="card-body">
        <form action="/product/{{ $products->id }}" method="POST">
            @method('PUT')
            @csrf
            <input type="hidden" name="id" id="id" value="{{ $products->id }}" id="id"/>
            <label>Name</label><br>
                <input type="text" name="name" id="name" value="{{ $products->name }}" class="form-control"><br>
            <label for="">Price</label>
                <input type="text" name="price" id="price" value="{{ $products->price }}" class="form-control"><br>
            <label for="">Description</label>
                <input type="text" name="description" id="description" value="{{ $products->description }}" class="form-control"><br>
                <select class="form-select @error('categories_id') is-invalid" @enderror aria-label="Default select example" name="categories_id"  id="category_id">
                    @foreach ($categories as $item)
                        @if ($products->categories_id == $item->id)
                            <option value="{{ $item->id }}" selected>
                                {{ $item->name }}
                            </option>
                        @else
                            <option value="{{ $item->id }}">
                                {{ $item->name }}
                            </option>
                    @endif
                    @endforeach

                </select>
                    @error('categories_id')

                        <div class="invalid-feedback">
                            pilih salah satu categori
                        </div>

                    @enderror

                {{-- <select class="form-select " aria-label="Default select example" name="id_kategori">
                    <option selected>Pilih Kategori Produk</option>
                        @foreach ($kategori as $item)
                            <option value="{{ $item->id }}" {{ $produk->id_kategori == $item->id ? 'selected' : '' }}>  {{ $item->nama }}</option>
                        @endforeach
                    </select>
                        <div class="invalid-feedback">
                            Pilih salah satu kategori
                        </div> --}}
                    <br>
                    <br>
                <button type="submit" class="btn btn-primary">Submit</button>


        </form>
    </div>
</div>
@endsection

