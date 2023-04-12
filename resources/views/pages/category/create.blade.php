@extends('layouts.dashboard')
@section('title')
    Category
@endsection

@section('content')
<div class="card" style="margin: 20px;">
    <div class="card-header"><h3>Create New Category</h3></div>
        <div class="card-body">
            <form action="{{ route('category.store') }}" method="POST">
                @csrf
                <label>Name</label><br>
                    <input type="text" name="name" id="name" class="form-control"><br>
                <label>Description</label><br>
                    <input type="text" name="description" id="description" class="form-control"><br>
                    <br>
                    <input type="submit" value="Save" class="btn btn-success"><br>
            </form>
        </div>
</div>
@endsection
