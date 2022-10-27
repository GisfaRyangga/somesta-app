@extends('layout/main')

@section('form')

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT"
        crossorigin="anonymous">
        
        <link rel="stylesheet" href="css/register.css">
    
        <title>Somesta Register</title>

    </head>
    <body id="regis">
    <div class="container mt-4">
            <h2 class="text-center mb-4 fw-bold">REGISTER</h2>
            <div class="offset-lg-2 col-lg-8">
                <form class="needs-validation" action="/form">
                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label" for="firstname">First name</label>
                            <input class="form-control" type="text" id="firstname" name="firstname" required>
                        </div>
                        <div class="col">
                            <label class="form-label" for="firstname">Last name</label>
                            <input class="form-control" type="text" id="lastname" name="lastname" required>
                        </div>
                    </div>
                    <div class="form-group was-validated mb-3">
                        <label class="form-label" for="email">Email</label>
                        <input class="form-control @error('password') is-invalid @enderror" type="email" id="email" name="email" required>
                        <div class="invalid-feedback">
                            Please enter your email
                        </div>
                    </div>
                    <div class="form-group was-validated mb-3">
                        <label class="form-label" for="username">Username</label>
                        <input class="form-control" type="text" id="username" name="username" required>
                        <div class="invalid-feedback">
                            Please enter your username
                        </div>
                    </div>
                    <div class="form-group was-validated mb-3">
                        <label class="form-label" for="password">Password</label>
                        <input class="form-control @error('password') is-invalid @enderror" type="password" id="password" name="password" required>
                        <div class="invalid-feedback">
                            Please enter your password
                        </div>
                    </div>
                    <div class="form-group was-validated mb-3">
                        <label class="form-label" for="password">Gender</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Male
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Female
                            </label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary w-100 mt-3">Register</button>
                    </div>
                </form>
            </div>
        </div>                                    
                        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
        crossorigin="anonymous"></script>
    </body>
</html>
@endsection
