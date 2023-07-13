@extends('layouts.app')
@section('content')

<div class="categories pad-el">
    <h2 class="main-title">
        <a class="" href="{{ route('categories.create') }}">Add Category</a>
    </h2>
    <div class="container">
        @forelse ($categories as $category)
            <div class="box">
                <img src="{{ asset($category->category_image) }}">
                <div class="content">
                    <h3>{{ $category->name }}</h3>
                </div>
                <div class="settings">
                        <button class="btn btn-danger button-edit"><a href="{{ route('categories.edit', $category->id) }}"> <i class="fas fa-pen"></i></a></button>
                        <td class="delete">
                                <form action="{{ route('categories.destroy', $category->id) }}" method="post" class="form-hidden">
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