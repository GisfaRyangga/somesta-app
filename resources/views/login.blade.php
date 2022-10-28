@extends('layout/main')

@section('form')

    <body id="log_in">

        <div class="container mt-4">
            <h2 class="text-center mb-4 fw-bold">LOGIN CMS SOMESTA</h2>
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

                    <div class="row mb-0">
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary">
                                Login
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
        crossorigin="anonymous"></script>
    </body>

@endsection
