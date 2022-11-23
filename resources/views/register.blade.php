@extends('layout/main')

@section('form')

<div class="container mt-4">
    
        <h2 class="text-center mb-4 fw-bold">ADD NEW ADMIN</h2>
        <div class="col-lg-5 tengah">
            @if (Session::has('pesan'))
                <div class="alert alert-success">{{Session::get('pesan')}}</div>
            @endif
            
            <div class="alert alert-warning">USERNAME SEMENTARA DISABLED KARENA ALASAN UX</div>
            <div class="alert alert-warning">Admin yang di add akan masuk di Firebase RealtimeDatabase dan Firebase Authentication</div>
            <form class="needs-validation" method="POST" action="{{ route('register_admin') }}">
                @csrf
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label fw-bold" for="firstname">First name</label>
                        <input class="form-control" type="text" id="firstname" name="firstname" required>
                        <div class="invalid-feedback">
                            Please enter your first name
                        </div>
                    </div>
                    <div class="col">
                        <label class="form-label fw-bold" for="firstname">Last name</label>
                        <input class="form-control" type="text" id="lastname" name="lastname" required>
                        <div class="invalid-feedback">
                            Please enter your last name
                        </div>
                    </div>
                </div>
                {{-- <div class="form-group mb-3">
                    <label class="form-label fw-bold" for="username">Username</label>
                    <input class="form-control" type="text" id="username" name="username" required>
                    <div class="invalid-feedback">
                        Please enter your username
                    </div>
                </div> --}}
                <div class="form-group mb-3">
                    <label class="form-label fw-bold" for="email">Email</label>
                    <input class="form-control @error('email') is-invalid @enderror" type="email" id="email" name="email" required>
                    <div class="invalid-feedback">
                        Please enter your email
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <div class="col">
                        <label class="form-label fw-bold" for="password">Password</label>
                        <input class="form-control" type="password" id="password" name="password" required>
                        <div class="invalid-feedback">
                            Please enter your password
                        </div>
                    </div>
                    <div class="col">
                        <label class="form-label fw-bold" for="confirmpassword">Confirm Password</label>
                        <input class="form-control" type="password" id="confirmpassword" name="confirmpassword" required>
                        <div class="form-text confirm-message"></div>
                        <div class="invalid-feedback">
                            Please enter your confirm password
                        </div>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label fw-bold" for="admin_type">Admin Type</label>
                    <div>
                        <input type="radio" class="btn-check" name="options" id="option1" autocomplete="off">
                        <label class="btn btn-outline-primary" for="option1">Super Admin</label>

                        <input type="radio" class="btn-check" name="options" id="option2" autocomplete="off" checked>
                        <label class="btn btn-outline-primary ms-2" for="option2">Admin</label>
                    </div>
                </div>
                @if (Session::has('register-error'))
                    <div class="alert alert-danger">{{Session::get('register-error')}}</div>
                @endif
                <div class="mb-3">
                    <button class="btn btnmerah btn-primary w-100 mt-3 fw-bold">Add</button>
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

@endsection
