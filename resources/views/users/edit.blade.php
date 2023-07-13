@extends('layouts.app')
@section('content')
<form class="public" action="{{ route('user.update', $user->users_id) }}" method="PUT" autocomplete="off" enctype="multipart/form-data">
        @csrf
        <label>User Name</label>
        <input type="text" class="@error('user_name') isinvalid @enderror" name="name" value="{{ $user->user_name }}" required>
        @error('name')
            <div class="" role="">
                {{ $message }}
            </div>
        @enderror
        <input type="submit" name="submit" class="button" value="Update" required>
</form>
@endsection