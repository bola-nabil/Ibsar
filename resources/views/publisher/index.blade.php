@extends('layouts.app')
@section('content')

<div class="global pad-el">
    <h2 class="main-title">
        <a class="" href="{{ route('publisher.create') }}">Add Publisher</a>
    </h2>
    <div class="container">
            @forelse ($publishers as $publisher)
            <div class="box">
                <div class="text">
                    {{ $publisher->name }}
                </div>
                <div class="settings">
                        <button class="btn btn-danger button-edit"><a href="{{ route('publisher.edit', $publisher->id) }}"> <i class="fas fa-pen"></i></a></button>
                        <td class="delete">
                                <form action="{{ route('publisher.destroy', $publisher->id) }}" method="post" class="form-hidden">
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