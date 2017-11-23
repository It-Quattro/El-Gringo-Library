<!-- Stored in resources/views/welcome.blade.php -->



@extends('layouts.app')

@section('title', 'Welcome Title')

@section('menu')
    @extends('layouts.menu')
@endsection

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <div class="content">
        <div class="title m-b-md">
            Laravel TOTO
        </div>

        <div class="links">
                <a href="https://laravel.com/docs">Documentation</a>
                <a href="https://laracasts.com">Laracasts</a>
                <a href="https://laravel-news.com">News</a>
                <a href="https://forge.laravel.com">Forge</a>
                <a href="https://github.com/laravel/laravel">GitHub</a>
        </div>
    </div>
@endsection



