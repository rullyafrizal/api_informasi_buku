<html lang="en">
<head>
    @include('admin.partials.head')
</head>

<body class="bg-gradient-primary">
<div class="container" id="app">
    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                </div>
                                <form method="POST" action="{{ route('login') }}" class="user">
                                    @csrf
                                    @if (session('error'))
                                        <div class="alert alert-danger">{{ session('error') }}</div>
                                    @endif
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control form-control-user {{$errors->has('email') ? 'is-invalid' : ''}}"
                                               id="exampleInputEmail" aria-describedby="emailHelp"
                                               placeholder="Enter Email Address...">
                                        @error('email')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-user {{$errors->has('password') ? 'is-invalid' : ''}}"
                                               id="exampleInputPassword" placeholder="Password">
                                        @error('password')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>
                                    <hr>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<!-- Bootstrap core JavaScript-->
@include('admin.partials.script')
</body>
</html>
