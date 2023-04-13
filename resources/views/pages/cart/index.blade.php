@extends('layouts.dashboard')
@section('title')
    Cart
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card mt-4">
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-body">
                    <form action="{{ route('cart.store') }}" class="table-responsive" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="products_id">Select Product</label>
                            <select class="form-select" id="products_id" name="products_id"
                                @error('products_id') is-invalid @enderror" required aria-label="Default select example">
                                <option selected disabled>Open this select menu</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                            @error('products_id')
                                <span class="text-danger"></span>
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="qty" class="form-label">Quantity</label>
                            <input type="number" id="qty" name="qty" class="form-control"
                                aria-labelledby="passwordHelpBlock">
                        </div>
                        <button type="submit" class="btn btn-primary">Add To Cart</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6"></div>
    </div>


    <div class="card shadow mt-4">
        <div class="card-header py-3">
            <h2>Halaman Cart</h2>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive mt-3">
                    <table class="table">
                        <thead>
                            <tr align="center">
                                <th>No</th>
                                <th>Product Name</th>
                                <th>Product Price</th>
                                <th>Quantity</th>
                                <th>Subtotal</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($carts as $item)
                                <tr align="center">
                                    <form action="{{ route('cart.update', $item->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->products->name }}</td>
                                        <td>Rp {{ number_format($item->products->price) }}</td>
                                        <td>
                                            <input type="number" value="{{ $item->qty }}" style="width:100px !important"
                                                class="form-control" name="qty">
                                        </td>
                                        <td>Rp {{ number_format($item->products->price * $item->qty) }}</td>
                                        <td class="d-flex justify-content-center">
                                            <button type="submit" class="btn btn-warning me-1">Update</button>
                                    </form>
                                    <form method="post" action="{{ route('cart.destroy', $item->id) }}">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    </td>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4" class="text-end"><b>Total</b></td>
                                <td colspan="2"><b>Rp {{ number_format($total) }}</b></td>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="text-end">
                        <a href="{{ route('checkout') }}" class="btn btn-primary">Checkout</a>
                    </div>
                </div>
            </div>

        </div>
    @endsection
