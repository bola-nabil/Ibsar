@extends('layouts.app')
@section('content')
<form class="form public test" action="{{ route('images.store') }}" method="post" autocomplete="off" enctype="multipart/form-data">
    @csrf
        <input type="file" name="book_image" placeholder="book_image">
    </div>
        <input type="submit" class="button" value="Save" required>
</form>
@endsection