@extends('layouts.app')
@section('content')
<form class="form" class="public" action="{{ route('authors.update', $auther->id) }}" method="post"
autocomplete="off">
@csrf
    <label>Author Name</label>
    <input type="text" class="@error('name') isinvalid @enderror" name="name"
        value="{{ $auther->name }}" required>
    @error('name')
        <div class="" role="">
            {{ $message }}
        </div>
    @enderror
</div>
<input type="submit" name="submit" class="button" value="Update" required>
</form>
@endsection
