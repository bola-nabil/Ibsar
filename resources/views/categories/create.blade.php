@extends('layouts.app')
@section('content')
<form class="form public test" action="{{ route('categories.store') }}" method="post" autocomplete="off" enctype="multipart/form-data">
    @csrf
        <label>Category Name</label>
        <input type="text" class="mb @error('name') isinvalid @enderror" placeholder="Category Name" name="name" value="{{ old('name') }}" required>
        @error('name')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
        @enderror
            <label>Category Image</label>
            <input type="file" name="category_image">
            <input type="submit" class="button" value="Save" required>
</form>
@endsection