@extends('layouts.app')
@section('content')

<div class="global pad-el">
    <h2 class="main-title">
        <a class="" href="{{ route('authors.create') }}">Add Search Words</a>
    </h2>
    <div class="container">
        @forelse ($authors as $auther)
        <div class="box">
            <div class="text">
                <td>{{ $auther->name }}</td>
            </div>
            <div class="settings">
                <button class="btn btn-danger button-edit"><a href="{{ route('authors.edit', $auther->id) }}"> <i class="fas fa-pen"></i></a></button>
                <td class="delete">
                        <form action="{{ route('authors.destroy', $auther->id) }}" method="post" class="form-hidden">
                             <button class="btn btn-danger button-edit"><i class="fas fa-trash"></i></button>
                            @csrf
                            @method('DELETE')
                    </form>
                </td>
            </div>
        </div>
        @empty
        @endforelse
    </div>
</div>
@endsection