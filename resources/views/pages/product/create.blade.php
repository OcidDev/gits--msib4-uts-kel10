@extends('layouts.dashboard')
@section('title')
    Add Product
@endsection

@section('content')
    <div class="card" style="margin: 20px;">
        <div class="card-header">
            <h3>Create New Product</h3>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ url('/product') }}" method="POST">
                @csrf
                <label>Name</label><br>
                <input type="text" name="name" id="name" class="form-control"><br>
                <label>Price</label><br>
                <input type="number" name="price" id="price" class="form-control"><br>
                <label>Description</label><br>
                <input type="text" name="description" id="description" class="form-control"><br>
                <br>
                <select class="form-select" aria-label="Default select example" name="category_id" id="category_id">
                    <option hidden>Pilih Categori product</option>
                    @foreach ($categories as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select><br><br></br>
                <input type="submit" value="Save" class="btn btn-success"><br>
            </form>
        </div>
    </div>


@endsection
