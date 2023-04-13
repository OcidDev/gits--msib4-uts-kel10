<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Register - Brand</title>
    <meta name="twitter:description" content="tesetstes">
    <meta name="twitter:image" content="assets/img/dogs/image3.jpeg">
    <meta name="description" content="testestes">
    <meta property="og:image" content="assets/img/dogs/image3.jpeg">
    <meta name="twitter:title" content="testestes">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}">
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="card shadow-lg o-hidden border-0 my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-flex">
                        <div class="flex-grow-1 bg-register-image" style="background-image: url(&quot;assets/img/dogs/image2.jpeg&quot;);"></div>
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h4 class="text-dark mb-4">Create an Account!</h4>
                            </div>
                            @if (session()->has('error') || session()->has('success'))
                            @if (session()->has('success'))
                                <script>
                                    setTimeout(() => {
                                        location.href ="login";
                                    }, 3000)
                                </script>
                            @endif
                                <div class="alert alert-{{ session()->has('success') ? 'success' : 'danger' }}">
                                    {{ session('success') ?? session('error') }}
                                </div>
                            @endif
                            <form class="user" method="POST" action="{{route('register')}}">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input class="form-control form-control-user" type="text" id="exampleFirstName" placeholder="Fullname" name="name" value="{{ old('name') }}"></div>

                                </div>
                                <div class="mb-3"><input class="form-control form-control-user" type="email" id="exampleInputEmail" aria-describedby="emailHelp"  value="{{ old('email') }}" placeholder="Email Address" name="email"></div>
                                <div class="row mb-3">
                                    <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="password" id="examplePasswordInput" placeholder="Password" name="password"></div>
                                    <div class="col-sm-6"><input class="form-control form-control-user" type="password" id="exampleRepeatPasswordInput" placeholder="Repeat Password" name="password_repeat"></div>
                                </div><button class="btn btn-primary d-block btn-user w-100" type="submit">Register Account</button>
                            </form>
                            <div class="text-center mt-3"><a class="small" href="{{route('login')}}">Already have an account? Login!</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.min.js') }}"></script>
</body>

</html>
