<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            a{
                text-decoration: none;
            }
        </style>
</head>

<body class="bg-primary">
    <div class="container mt-5 pt-3">
        <div class="row justify-content-center mt-5">
            <div class="col-6">
                <div class="card shadow mb-2">
                    <div class="card-header bg-white border border-bottom-0">
                        <h2 class="card-title text-center">Form Login</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{route('authenticate')}}" method="POST">
                            @csrf
                            <div class="my-2">
                                <label class="form-label">Email or Username:</label>
                                <input type="text" class="form-control" id="username" placeholder="Enter email or username"
                                    name="username">
                            </div>
                            <div class="my-2">
                                <label class="form-label">Password:</label>
                                <input type="password" class="form-control" id="password" placeholder="Enter password"
                                    name="password">
                            </div>
                            <div class="form-check form-switch form-check-reverse">
                                <input class="form-check-input" type="checkbox" role="switch" id="rememberMe">
                                <label class="form-check-label" for="rememberMe">Remember Me</label>
                            </div>
                            <div class="text-end my-3">
                                <button class="btn btn-info bg-gradient" type="submit">Login</button>
                            </div>
                            {{-- <div class="text-center my-2">
                                <a href="#" class="link-dark">Forgot Password?</a>
                            </div> --}}
                            {{-- <div class="text-center mt-4 mb-2">
                                                Or login with
                                                <div class="my-2">
                                                    <a class="btn btn-dark btn-sm" href="#" role="button">
                                                        <i class="bi bi-github"></i> GitHub
                                                    </a>
                                                    <a class="btn btn-dark btn-sm" href="#" role="button">
                                                        <i class="bi bi-google"></i> Google
                                                    </a>
                                                </div>
                                            </div> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    @include('layouts.scripts.sweetalert')
</body>

</html>
