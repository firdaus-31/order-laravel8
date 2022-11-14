<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>E-ORDER | Login Sistem</title>

    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="{{asset('mgg/mgg/mgg_logo.png')}}">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">

    <!-- Styles -->
    <link href="{{ asset('template/assets/css/lib/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/assets/css/lib/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('template/assets/css/lib/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/assets/css/lib/helper.css') }}" rel="stylesheet">
    <link href="{{ asset('template/assets/css/style.css') }}" rel="stylesheet">
</head>

<body style="background-image: url('{{ asset('mgg/mgg/2.jpg') }}');background-size: 100%;background-position: center;background-repeat: no-repeat;">

    <div class="unix-login">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="login-content" style="margin: 30px 0;">
                        <div class="login-form" style="border-radius: 20px;">
                            <center>
                                <img src="{{ asset('mgg/mgg/mgg_menu.png') }}" width="400px" alt="">
                            </center>
                            <h4>E-Order Sistem</h4>
                            @if($pesan = Session::get('LoginError'))
                            <div class="alert alert-danger alert-dismissible fade show">
                                {{ $pesan }}
                            </div>
                            @endif
                            <form method="post" action="{{ route('pos_login') }}">
                                @csrf
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="username" @error('username') is-invalid @enderror class="form-control" placeholder="Username" autofocus required value="{{ old('username') }}">
                                    @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                </div>
                                <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30" style="border-radius:10px;">Sign in</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>