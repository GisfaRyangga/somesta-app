@extends('layout/main')

@section('form')
    <div class="container text-center mt-5">
        <h1>About Page</h1>
        <hr>
        <div class="mt-4">
            <img src="img/pp.jpg" alt="ichigo" width="200" class="rounded-circle mb-3">
            <h1 class="display-8">nama user</h1>
            <p class="lead">isi bebas</p>
        </div>

        <h2>firebaseUserId:</h2>
        <p>{{ Session::get('firebaseUserId'); }}</p>
        {{-- <h2>idToken:</h2>
        <p>{{ Session::get('idToken'); }}</p> --}}
        <h2>role:</h2>
        <p>{{ Session::get('thisUserRole'); }}</p>
    </div>
@endsection