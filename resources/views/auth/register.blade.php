<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin-Panel</title>
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="row w-100 m-0">
                <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
                    <div class="card col-lg-5 mx-auto">
                        <div class="card-body px-5 py-5">
                            <h3 class="card-title text-left mb-3">Register</h3>

                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="form-group">
                                    <label>Username <span class="text-danger"> *</span></label>
                                    <input type="text" class="form-control text-light p_input" type="text" name="name"
                                        :value="old('name')" required autofocus autocomplete="name" id="name">
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Email <span class="text-danger"> *</span></label>
                                            <input type="email" class="form-control text-light p_input" type="email" name="email"
                                                :value="old('email')" required autocomplete="username" id="email">
                                        </div>
                                        
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Phone no. <span class="text-danger"> *</span></label>
                                            <input type="phone" class="form-control text-light p_input" type="number" name="phone"
                                                :value="old('phone')" required autocomplete="username" id="phone" maxlength="10">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Password <span class="text-danger"> *</span></label>
                                            <input type="password" class="form-control text-light p_input" type="password" name="password"
                                                required autocomplete="new-password" id="password">
                                        </div>
                                        
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Confirm Password <span class="text-danger"> *</span></label>
                                            <input type="password" class="form-control text-light p_input" type="password"
                                                name="password_confirmation" required autocomplete="new-password"
                                                id="password_confirmation">
                                        </div>
                                    </div>
                                </div>
                                
                               
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-block enter-btn">Register</button>
                                </div>
                                <div class="d-flex">
                                    <button class="btn btn-facebook col mr-2">
                                        <i class="mdi mdi-facebook"></i> Facebook </button>
                                    <button class="btn btn-google col">
                                        <i class="mdi mdi-google-plus"></i> Google plus </button>
                                </div>
                                <p class="sign-up text-center">Already have an Account?<a href="{{ route('login') }}">
                                       LogIn</a></p>


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
    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('assets/js/misc.js') }}"></script>
    <script src="{{ asset('assets/js/settings.js') }}"></script>
    <script src="{{ asset('assets/js/todolist.js') }}"></script>
    <!-- endinject -->
</body>

</html>
