@extends('layouts.app')
@section('content')

<div class="gallery pad-el">
    <h2 class="main-title">
        <a class="" href="{{ route('images.create') }}">Add Image</a>
    </h2>
    <div class="container">
        @forelse ($images as $image)
        <div class="box">
            <div class="image">
                <img src="{{ asset($image->book_image) }}">
            </div>
                <div class="settings">
                <button class="btn btn-danger button-edit"><a href="{{ route('images.edit', $image->id) }}"> <i class="fas fa-pen"></i></a></button>
                <td class="delete">
                        <form action="{{ route('images.destroy', $image->id) }}" method="post" class="form-hidden">
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