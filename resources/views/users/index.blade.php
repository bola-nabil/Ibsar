@extends('layouts.app')
@section('content')
    <div class="pad-el">
    <div id="admin-content">
         <h2 class="main-title">
            <a class="" href="{{ route('users.create') }}">Add User</a>
        </h2>
        <div class="container">
            <div class="row">
                <div class="offset-md-7 col-md-2">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="message"></div>
                    <table class="content-table">
                        <thead>
                            <th>User ID</th>
                            <th>User Name</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td>{{ $user->users_id }}</td>
                                    <td>{{ $user->user_name }}</td>
                                    <td class="edit">
                                        <a href="{{ route('users.edit', $user) }}" class="btn btn-success">Edit</a>
                                    </td>
                                    <td class="delete">
                                        <form class="form-hidden" action="{{ route('users.destroy', $user->users_id) }}" method="post">
                                            <button class="btn btn-x delete-author"">Delete</button>
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">No Users Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection