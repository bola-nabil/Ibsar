@extends('layouts.app')
@section('content')
<form action="{{ route('users.store') }}" method="post" autocomplete="off" class="public form">
            @csrf
            <label>User Name</label>
            <input type="text" @error('user_name') isinvalid @enderror" placeholder="User Name" name="user_name" value="{{ old('user_name') }}" required>
            @error('user_name')
                <div class="" role="">
                    {{ $message }}
                </div>
            @enderror
       <input type="submit" name="save" class="button" value="save" required>
</form>
@endsection