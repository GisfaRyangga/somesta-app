@extends('layout/main')

@section('form')
    <div class="container text-center mt-5">
        <h1>ABOUT PAGE</h1>
        <hr>
        <div class="mt-4">
            <img src="img/pp.jpg" alt="ichigo" width="100" class="rounded-circle mb-3">
            <p class="mt-2">Email User:</p>
            <p class="abu margin-minus">{{ Session::get('email'); }}</p>
        </div>

        <div>
            <p>FirebaseUserId:</p>
            <p class="abu margin-minus">{{ Session::get('firebaseUserId'); }}</p>
        </div>
        
        <div>
            <p>Role:</p>
            <p class="abu margin-minus">{{ Session::get('thisUserRole'); }}</p>
        </div>
    </div>
@endsection