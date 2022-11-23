{{-- @extends('layout/main') --}}

{{-- @section('form') --}}
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!-- Bootstrap CSS -->
        {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT"
        crossorigin="anonymous"> --}}

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
        rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
        crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/somesta.css">
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
        <title>Somesta Login</title>

    </head>
    <body id="log_in">
        <div class="container middle">
            <h2 class="text-center mb-4 fw-bold">LOGIN CMS SOMESTA</h2>
            <div class="col-lg-5 tengah">
            <div class="alert alert-success">SUPERADMIN email / pass: <b>super@super.com</b> / <b>123123123</b></div>
            <div class="alert alert-success">ADMIN email / pass: <b>noob@noob.com</b> / <b>123123123</b></div>
            <form class="needs-validation" method="POST" action="{{ route('login.submit') }}">
                @csrf
                    <div class="form-group mb-3">
                        <label class="form-label fw-bold" for="username">Username</label>
                        <input class="form-control" type="text" id="username" name="username" required>
                        <div class="invalid-feedback">
                            Please enter your username
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label fw-bold" for="password">Password</label>
                        <input class="form-control" type="password" id="password" name="password" required>
                        <div class="invalid-feedback">
                            Please enter your password
                        </div>
                    </div>
                    <div class="form-group form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="check">
                        <label class="form-check-label" for="check">Remember me</label>
                    </div>
                    @if (Session::has('login-error'))
                        <div class="alert alert-danger">{{Session::get('login-error')}}</div>
                    @endif
                    <div class="mb-3">
                        <button class="btn btnmerah btn-primary w-100 mt-3 fw-bold">Login</button>
                    </div>
                </form>
            </div>
        </div>
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
        crossorigin="anonymous"></script>
    </body>

{{-- @endsection --}}
