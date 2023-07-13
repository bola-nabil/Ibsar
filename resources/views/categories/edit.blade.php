@extends('layouts.app')
@section('content')
<form class="form public" action="{{ route('categories.update', $category->id) }}" method="post" autocomplete="off" enctype="multipart/form-data">
    @csrf
    @method('PUT')
        <label>Category Name</label>
        <input type="text" name="name" value="{{ $category->name }}" class="form-control" placeholder="Category Name">
        <h3>Current Image</h3>
        <img src="{{ asset($category->category_image) }}" width="100px" class="mb-3">
        <input type="file" name="category_image">
    </div>
    <input type="submit" class="button" value="Update" required>
</form>
@endsection