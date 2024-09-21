<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Panel</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- End layout styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="row w-100 m-0">
                <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
                    <div class="card col-lg-4 mx-auto">
                        <div class="card-body px-5 py-5">
                            <h3 class="card-title text-left mb-3">Login</h3>

                            <x-auth-session-status class="mb-4" :status="session('status')" />

                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group">
                                    <label>Email / Phone no. <span class="text-danger"> *</span></label>
                                    <input type="text"id="userlogin" class="form-control text-light p_input" type="userlogin"
                                        name="userlogin" :value="old('userlogin')" required autofocus
                                        autocomplete="username">
                                </div>


                                <div class="form-group">
                                    <label>Password <span class="text-danger"> *</span></label>
                                    {{-- <input type="text" class="form-control text-light p_input" type="password" name="password"
                                        required autocomplete="current-password" id="password"> --}}


                                        <div class="input-group">
                                            <input class="form-control text-light p_input" placeholder="*********" id="password" type="password" name="password" required  autocomplete="current-password" aria-describedby="basic-addon1" />
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon1" onclick="view_pass()"><i class="fa-solid fa-eye"></i></span>
                                            </div>
                                        </div> 
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" id="remember_me" class="form-check-input">
                                        Remember me </label>
                                </div>

                                <div class="flex items-center justify-end mt-4">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-12 d-flex flex-column text-light align-items-center">
                                                @if (Route::has('password.request'))
                                                    <a href="{{ route('password.request') }}" class="text-muted mb-2">Forgot password?</a>
                                                @endif
                                                <button type="submit" class="btn btn-primary btn-lg w-100">Log in</button>
                                            </div>
                                        </div>
                                    </div>                                    

                                    <div class="d-flex">
                                        <button class="btn btn-facebook mr-2 col">
                                            <i class="mdi mdi-facebook"></i> Facebook </button>
                                        <button class="btn btn-google col">
                                            <i class="mdi mdi-google-plus"></i> Google plus </button>
                                    </div>
                                    <p class="sign-up">Don't have an Account?<a href="{{ route('register') }}"> Sign
                                            In</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
            </div>
            <!-- row ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('assets/js/misc.js') }}"></script>
    <script src="{{ asset('assets/js/settings.js') }}"></script>
    <script src="{{ asset('assets/js/todolist.js') }}"></script>
    <script>
          function view_pass() {
            var password = document.getElementById("password");
            if (password.type === "password") {
                password.type = "text";
            } else {
                password.type = "password";
            }
            }
    </script>
    <!-- endinject -->
</body>

</html>
