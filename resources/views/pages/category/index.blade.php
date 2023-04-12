@extends('layouts.dashboard')
@section('title')
    Category
@endsection

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h2>Halaman Product</h2>
    </div>
    <div class="card">
        <a href="{{ route('category.create') }}" class="btn btn-success btn-sm" title="Add Category">
            Add New
        </a>
    <div class="card-body">
        <div class="table-responsive mt-3">
            <table class="table">
                <thead>
                    <tr align="center">
                        <th>No</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $categories as $item )
                    <tr align="center">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->description }}</td>
                        <td class="d-flex mx-0">
                            <a class="btn btn-warning" href="{{ route('category.edit', $item->id) }}"
                                role="button">Edit</a>
                            <form method="post" action="{{ route('category.destroy', $item->id) }}">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger ms-3">Delete</button>
                            </form>
                        </td>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
