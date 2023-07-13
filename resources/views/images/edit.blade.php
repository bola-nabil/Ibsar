@extends('layouts.app')
@section('content')
<form class="form public" action="{{ route('images.update', $image->id) }}" method="post" autocomplete="off" enctype="multipart/form-data">
        @csrf
        @method('PUT')
            <h3>Current Image<h3>
            <img src="{{ asset($image->book_image) }}" width="100px">
            <input type="file" name="book_image" placeholder="book_image">
            <input type="submit" class="button" value="Update" required>
</form>
@endsection