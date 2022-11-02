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
    
        <title>Somesta Add Admin</title>

    </head>
    <body id="regis">
    <div class="container mt-4">
            <h2 class="text-center mb-4 fw-bold">ADD NEW ADMIN</h2>
            <div class="offset-lg-2 col-lg-8">
                <form class="needs-validation" action="/form">
                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label" for="firstname">First name</label>
                            <input class="form-control" type="text" id="firstname" name="firstname" required>
                            <div class="invalid-feedback">
                                Please enter your email
                            </div>
                        </div>
                        <div class="col">
                            <label class="form-label" for="firstname">Last name</label>
                            <input class="form-control" type="text" id="lastname" name="lastname" required>
                            <div class="invalid-feedback">
                                Please enter your email
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="username">Username</label>
                        <input class="form-control" type="text" id="username" name="username" required>
                        <div class="invalid-feedback">
                            Please enter your username
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="email">Email</label>
                        <input class="form-control @error('email') is-invalid @enderror" type="email" id="email" name="email" required>
                        <div class="invalid-feedback">
                            Please enter your email
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <div class="col">
                            <label class="form-label" for="password">Password</label>
                            <input class="form-control" type="password" id="password" name="password" required>
                            <div class="invalid-feedback">
                                Please enter your password
                            </div>
                        </div>
                        <div class="col">
                            <label class="form-label" for="confirmpassword">Confirm Password</label>
                            <input class="form-control" type="password" id="confirmpassword" name="confirmpassword" required>
                            <div class="form-text confirm-message"></div>
                            <div class="invalid-feedback">
                                Please enter your confirm password
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="gender">Admin Type</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="super_admin" value="super_admin" checked/>
                                <label class="form-check-label" for="super_admin">Super Admin</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="admin" value="admin"/>
                                <label class="form-check-label" for="admin">Admin</label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary w-100 mt-3">Add</button>
                    </div>
                </form>
            </div>
        </div>                                    
                        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
        crossorigin="anonymous"></script>
     
    <!-- script jquery  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- script confirm password -->
    <script>
        $('#password, #confirmpassword').on('keyup', function(){

            $('.confirm-message').removeClass('success-message').removeClass('error-message');

            let password=$('#password').val();
            let confirm_password=$('#confirmpassword').val();

            if(password===""){
                $('.confirm-message').text("Password Field cannot be empty").addClass('error-message');
            }
            else if(confirm_password===""){
                $('.confirm-message').text("Confirm Password Field cannot be empty").addClass('error-message');
            }
            else if(confirm_password===password)
            {
                $('.confirm-message').text('Password Match!').addClass('success-message');
            }
            else{
                $('.confirm-message').text("Password Doesn't Match!").addClass('error-message');
            }
        });
    </script>
    </body>
</html>
@endsection
