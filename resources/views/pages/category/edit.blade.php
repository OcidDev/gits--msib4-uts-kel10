@extends('layouts.dashboard')
@section('title')
    Category
@endsection

@section('content')
<div class="container-fluid">

    <div class="card mt-4">
        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger alert-dismissible">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="{{ route('category.update',$item->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="category_name" class="form-label">Category Name</label>
                    <input type="text" class="form-control" id="category_name" name="name" value="{{ $item->name }}" required>
                </div>
                <div class="mb-3">
                    <label for="category_description" class="form-label">Category Description</label>
                    <input type="text" class="form-control" id="category_description" name="description" value="{{ $item->description }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>

</div> <!-- container -->
@endsection
