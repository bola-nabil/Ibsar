@extends('layouts.app')
@section('content')

<div class="departments pad-el">
    <div class="container">
        <div class="box">
            <i class="fas fa-paper-plane fa-4x"></i>
            <h3>Publishers</h3>
            <div class="info">
                <a href="{{ route('publishers')}}">Details</a>
            </div>
        </div>
        <div class="box">
            <i class="fas fa-search fa-4x"></i>
            <h3>Search Words</h3>
            <div class="info">
                <a href="{{ route('authors')}}">Details</a>
            </div>
        </div>
        <div class="box">
            <i class="fas fa-server fa-4x"></i>
            <h3>categories</h3>
            <div class="info">
                <a href="{{ route('categories')}}">Details</a>
            </div>
        </div>
        <div class="box">
            <i class="fas fa-file-image fa-4x"></i>
            <h3>Images</h3>
            <div class="info">
                <a href="{{ route('images')}}">Details</a>
            </div>
        </div>
        <div class="box">
            <i class="fas fa-file-audio fa-4x"></i>
            <h3>Files</h3>
            <div class="info">
                <a href="{{ route('files')}}">Details</a>
            </div>
        </div>
    </div>
</div>
@endsection