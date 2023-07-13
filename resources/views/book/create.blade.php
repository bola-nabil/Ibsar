@extends('layouts.app')
@section('content')

<form class="form" action="{{ route('book.store') }}" method="post" autocomplete="off" enctype="multipart/form-data">
    @csrf
    <div class="">
        <label>Book Name</label>
        <input type="text" class="@error('name') isinvalid @enderror"
            placeholder="Book Name" name="name" value="{{ old('name') }}" required>
        @error('name')
            <div class="" role="">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="">
        <label>Publisher</label>
        <select class="@error('publisher_id') isinvalid @enderror " name="publisher_id" required>
            <option value="">Select Publisher</option>
            @foreach ($publishers as $publisher)
                <option value='{{ $publisher->id }}'>{{ $publisher->name }}</option>
            @endforeach
        </select>
        @error('publisher_id')
            <div class="" role="">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="">
        <label>Search Words</label>
        <select class="@error('auther_id') isinvalid @enderror " name="auther_id" required>
            <option value="">Select Search Words</option>
            @foreach ($authors as $author)
                <option value='{{ $author->id }}'>{{ $author->name }}</option>";
            @endforeach
        </select>
        @error('auther_id')
            <div class="" role="">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="form-group">
        <label>Category Name</label>
        <select class="@error('category_id') isinvalid @enderror " name="category_id" required>
            <option value="">Select Category Name</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category_id')
            <div class="" role="">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="">
        <label>Image Link</label>
        <select class="@error('image_id') isinvalid @enderror " name="image_id" required>
            <option value="">Select Image Link</option>
            @foreach ($images as $image)
                <option value="{{ $image->id }}">{{ $image->book_image }}</option>
            @endforeach
        </select>
        @error('image_id')
            <div class="" role="alert">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="">
        <label>File Link</label>
        <select class="@error('file_id') isinvalid @enderror" name="file_id" required>
            <option value="">Select File Link </option>
            @foreach ($files as $file)
                <option value='{{ $file->id }}'>{{ $file->book_file }}</option>
            @endforeach
        </select>
        @error('file_id')
            <div class="" role="">
                {{ $message }}
            </div>
        @enderror
    </div>
    <input type="submit" name='Save' class="button" value="Save" required>
</form>
@endsection