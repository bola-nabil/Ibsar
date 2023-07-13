@extends('layouts.app')
@section('content')
<form class="form public" action="{{ route('change_password') }}" method="post" autocomplete="off">
    @csrf
        <label>Current Password</label>
        <input type="password" class="f" name="c_password" value=""
            required>
        @error('c_password')
            <div class="" role="">
                {{ $message }}
            </div>
        @enderror
    </div>
        <label>New Password</label>
        <input type="password" class="" name="password" value="" required>
        @error('new_password')
            <div class="" role="">
                {{ $message }}
            </div>
        @enderror
        <label>Confirm Password</label>
        <input type="password" class="" name="password_confirmation" value="" required>
        @error('new_password')
            <div class="" role="">
                {{ $message }}
            </div>
        @enderror
    <input type="submit" class="button" value="Update" required>
</form>
@endsection
