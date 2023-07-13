@extends('layouts.app')
@section('content')
<form class="form public" action="{{ route('publisher.update', $publisher->id) }}" method="post"
autocomplete="off">
        @csrf
        <label>Publisher Name</label>
        <input type="text" class=" @error('name') isinvalid @enderror" name="name"
            value="{{ $publisher->name }}" required>
        @error('name')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
        @enderror
        <input type="submit" name="submit" class="button" value="Update" required>
</form>
@endsection
