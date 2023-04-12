@extends('layouts.dashboard')
@section('title')
    Product
@endsection

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h2>Halaman Product</h2>
    </div>
    <div class="card">
        <a href="{{ url('/product/add') }}" class="btn btn-success btn-sm" title="Add Category">
            Add New
        </a>
    <div class="card-body">
        <div class="table-responsive mt-3">
            <table class="table">
                <thead>
                    <tr align="center">
                        <th>No</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Category Product</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $products as $item )
                    <tr align="center">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ number_format($item->price) }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->category->name }}</td>
                        <td>
                            <a href="/product/{{ $item->id }}/edit" class="btn btn-warning">Edit</a>
                            <a href="/product/destroy/{{ $item->id }} " class="btn btn-danger">Delete</a>
                        </td>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection
