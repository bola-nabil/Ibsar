@extends('layouts.app')
@section('content')
<form class="form public test" action="{{ route('files.store') }}" method="post" autocomplete="off" enctype="multipart/form-data">
    @csrf
    <label>File Name</label>
        <input type="text" @error('name') isinvalid @enderror" placeholder="File Name" name="name" value="{{ old('name') }}" required>
        @error('name')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
        @enderror
        <input type="file" name="book_file" placeholder="Book File">
    </div>
    <input type="submit" class="button" value="Save" required>
</form>
@endsection