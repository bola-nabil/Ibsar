@extends('layouts.app')
@section('content')
<form class="form public" action="{{ route('files.update', $file->id) }}" method="post" autocomplete="off" enctype="multipart/form-data">
    @csrf
    @method('PUT')
     <label>File Name</label>
    <input type="text" name="name" value="{{ $file->name }}"placeholder="File Name">
    <h3 class="audio">Current File</h3>
    <audio controls style="width: 250px;">
            <source src="{{ asset($file->book_file) }}" type="audio/mpeg">
    </audio>
    <input type="file" name="book_file" placeholder="book_File">
    <input type="submit" class="button" value="Update" required>
</form>
@endsection