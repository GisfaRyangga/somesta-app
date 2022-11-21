@extends('layout/main')

@section('form')
    <div class="container text-center mt-5">
        <h1>About Page</h1>
        <hr>
        <h2>firebaseUserId:</h2>
        <p>{{ Session::get('firebaseUserId'); }}</p>
        <h2>idToken:</h2>
        <p>{{ Session::get('idToken'); }}</p>
        <h2>role:</h2>
        <p>{{ Session::get('thisUserRole'); }}</p>
    </div>
@endsection