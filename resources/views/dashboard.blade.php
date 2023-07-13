@extends('layouts.app')
@section('content')

<div class="stats pad-el">
    <h2 class="main-title">Dashboard</h2>
        <div class="container">
            <div class="box">
                <i class="fas fa-user fa-2x fa-fw"></i>
                <span class="number">{{ $users }}</span>
                <span class="text">Users</span>
            </div>
            <div class="box">
                <i class="fas fa-book fa-2x fa-fw"></i>
                <span class="number">{{ $books }}</span>
                <span class="text">Books</span>
            </div>
            <div class="box">
                <i class="fas fa-paper-plane fa-2x fa-fw"></i>
                <span class="number">{{ $publishers }}</span>
                <span class="text">Publishers</span>
            </div>
            <div class="box">
                <i class="fas fa-search fa-2x fa-fw"></i>
                <span class="number">{{ $authors }}</span>
                <span class="text">Search Words</span>
            </div>
            <div class="box">
                <i class="fas fa-server fa-2x fa-fw"></i>
                <span class="number">{{ $categories }}</span>
                <span class="text">categories</span>
            </div>
            <div class="box">
                <i class="fas fa-file-image fa-2x fa-fw"></i>
                <span class="number">{{ $images }}</span>
                <span class="text">Images</span>
            </div>
            <div class="box">
                <i class="fas fa-file-audio fa-2x fa-fw"></i>
                <span class="number">{{ $files }}</span>
                <span class="text">Files</span>
            </div>
        </div>
</div>
@endsection