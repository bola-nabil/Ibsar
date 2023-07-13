@extends('layouts.app')
@section('content')

<form class="form" action="{{ route('book.update', $book->id) }}" method="post" class="form" autocomplete="off">
    @csrf
    <div class="">
        <label>Book Name</label>
        <input type="text" class="@error('name') isinvalid @enderror"
            placeholder="Book Name" name="name" value="{{ $book->name }}" >
        @error('name')
            <div class="" role="">
                {{ $message }}
            </div>
        @enderror
    </div>

        <label>Publisher</label>
        <select class="@error('publisher_id') isinvalid @enderror "
            name="publisher_id" >
            <option value="">Select Publisher</option>
            @foreach ($publishers as $publisher)
                @if ($publisher->id == $book->publisher_id)
                    <option value="{{ $publisher->id }}" selected>{{ $publisher->name }}</option>
                @else
                    <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                @endif
            @endforeach
        </select>
        @error('publisher_id')
            <div class="" role="">
                {{ $message }}
            </div>
        @enderror

        <label>Search Words</label>
        <select class="@error('auther_id') isinvalid @enderror" name="author_id">
            <option value="">Select Search Words</option>
            @foreach ($authors as $auther)
                @if ($auther->id == $book->auther_id)
                    <option value="{{ $auther->id }}" selected>{{ $auther->name }}</option>
                @else
                    <option value="{{ $auther->id }}">{{ $auther->name }}</option>
                @endif
            @endforeach
        </select>
        @error('auther_id')
            <div class="" role="">
                {{ $message }}
            </div>
        @enderror

        <label>Category Name</label>
        <select class="@error('category_id') isinvalid @enderror " name="category_id">
            <option value="">Select Category Name</option>
            @foreach ($categories as $category)
                @if ($category->id == $book->category_id)
                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                @else
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endif
            @endforeach
        </select>
        @error('category_id')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
        @enderror
        <label>Image Link</label>
        <select class="form-control @error('image_id') isinvalid @enderror "
            name="image_id" >
            <option value="">Select Image Link</option>
            @foreach ($images as $image)
                @if ($image->id == $book->image_id)
                    <option value="{{ $image->id }}" selected>{{ $image->book_image }}</option>
                @else
                    <option value="{{ $image->id }}">{{ $image->book_image }}</option>
                @endif
            @endforeach
        </select>
        @error('image_id')
            <div class="" role="alert">
                {{ $message }}
            </div>
        @enderror

        <label>File Link</label>
        <select class="form-control @error('file_id') isinvalid @enderror "
            name="file_id" >
            <option value="">Select File Link</option>
            @foreach ($files as $file)
                @if ($file->id == $book->file_id)
                    <option value="{{ $file->id }}" selected>{{ $file->book_file }}</option>
                @else
                    <option value="{{ $file->id }}">{{ $file->book_file }}</option>
                @endif
            @endforeach
        </select>
        @error('file_id')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
        @enderror
    <input type="submit" name="save" class="button" value="Update" >
        </form>
            </div>
        </div>
    </div>
</div>

@endsection