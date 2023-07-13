@extends('layouts.app')
@section('content')
<form class="form" action="{{ route('authors.store') }}" method="post" autocomplete="off" class="public">
        @csrf
            <label>Author Name</label>
            <input type="text" class="form-control @error('name') isinvalid @enderror" placeholder="Author Name" name="name" value="{{ old('name') }}" required>
            @error('name')
                <div class="" role="">
                    {{ $message }}
                </div>
            @enderror
        </div>
    <input type="submit" name="save" class="button" value="save" required>
</form>
@endsection