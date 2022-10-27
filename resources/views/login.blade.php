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
    
        <title>Somesta Login</title>

    </head>
    <body id="log_in">

        <div class="container mt-4">
            <h2 class="text-center mb-4 fw-bold">LOGIN</h2>
            <div class="offset-lg-2 col-lg-8">
            <form class="needs-validation" action="/form">
                    <div class="form-group was-validated mb-3">
                        <label class="form-label" for="username">Username</label>
                        <input class="form-control" type="text" id="username" required>
                        <div class="invalid-feedback">
                            Please enter your username
                        </div>
                    </div>

                    <div class="form-group was-validated mb-3">
                        <label class="form-label" for="password">Password</label>
                        <input class="form-control" type="password" id="password" required>
                        <div class="invalid-feedback">
                            Please enter your password
                        </div>
                    </div>

                    <div class="form-group form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="check">
                        <label class="form-check-label" for="check">Remember me</label>
                    </div>

                    <div class="mb-3">
                        <button class="btn btn-primary w-100">Login</button>
                    </div>

                    <div class="d-grid">
                        <label>Not registered yet?
                            <a href="/register">Create an account</a>
                        </label>
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
