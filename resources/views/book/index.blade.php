@extends('layouts.app')
@section('content')

<div class="gallery pad-el" id="gallery">
    <h2 class="main-title">Books</h2>
    <div class="container">
        @forelse ($books as $book)
        <div class="box">
            <div class="image">
                <img src="{{ $book->image->book_image }}">
            </div>
            <div class="settings">
                    <button class="btn btn-danger button-edit"><a href="{{ route('book.edit', $book->id) }}"> <i class="fas fa-pen"></i></a></button>
                    <td class="delete">
                            <form action="{{ route('book.destroy', $book->id) }}" method="post" class="form-hidden">
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