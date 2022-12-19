@extends('layout/main')

@section('form')
    <div class="container text-center mt-5">
        <h1>About Page</h1>
        <hr>
        <div class="mt-4">
            <img src="img/pp.jpg" alt="ichigo" width="200" class="rounded-circle mb-3">
            <p class="mt-2">Nama User:</p>
            <p class="abu margin-minus">isi bebas</p>
        </div>

        <div>
            <p>FirebaseUserId:</p>
            <p class="abu margin-minus">{{ Session::get('firebaseUserId'); }}</p>
        </div>
        
        {{-- <h2>idToken:</h2>
        <p>{{ Session::get('idToken'); }}</p> --}}
        <div>
            <p>Role:</p>
            <p class="abu margin-minus">{{ Session::get('thisUserRole'); }}</p>
        </div>
    </div>
@endsection