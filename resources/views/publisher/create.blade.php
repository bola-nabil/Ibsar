@extends('layouts.app')
@section('content')
<form class="form public" action="{{ route('publisher.store') }}" method="post" autocomplete="off">
    @csrf
        <label>Publisher Name</label>
        <input type="text" class="form-control @error('name') isinvalid @enderror" placeholder="Publisher Name" name="name" value="{{ old('name') }}" required>
        @error('name')
            <div class="" role="">
                {{ $message }}
            </div>
        @enderror
    <input type="submit" name="save" class="button" value="Save" required>
</form>
@endsection
