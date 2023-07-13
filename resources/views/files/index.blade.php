@extends('layouts.app')
@section('content')
<div class="files pad-el">
    <h2 class="main-title">
        <a class="" href="{{ route('files.create') }}">Add File</a>
    </h2>
    <div class="container">
            @forelse ($files as $file)
                <div class="box">
                    <div class="file">
                        <audio controls>
                            <source src="{{ asset($file->book_file) }}" type="audio/mpeg">
                        </audio>
                    </div>
                    <h2 class="name"> {{ $file->name }} </h2>
                    <div class="settings">
                        <button class="btn btn-danger button-edit"><a href="{{ route('files.edit', $file->id) }}"> <i class="fas fa-pen"></i></a></button>
                        <td class="delete">
                                <form action="{{ route('files.destroy', $file->id) }}" method="post" class="form-hidden">
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