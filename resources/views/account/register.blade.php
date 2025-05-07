{{-- @extends('master.main')
@section('title', 'Đăng ký')
@section('main')
    
<!-- main-area -->
<main>

    <!-- breadcrumb-area -->
    <section class="breadcrumb-area tg-motion-effects breadcrumb-bg" data-background="uploads/bg/breadcrumb_bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content">
                        <h2 class="title">Đăng ký</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Trang chủ</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Đăng ký</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- contact-area -->
    <section class="contact-area">
        
        <div class="contact-wrap">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="contact-content">
                            <div class="section-title mb-15">
                                <span class="sub-title">Đăng ký</span>
                            </div>
                            <form action="" method="POST">
                                @csrf
                                <div class="contact-form-wrap">
                                    <div class="form-grp">
                                        <input name="name" type="text" placeholder="Tên của bạn *" value="{{ old('name') }}">
                                        @error('name')
                                            <div class="help-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-grp">
                                        <input name="email" type="email" placeholder="email của bạn *" value="{{ old('email') }}">
                                        @error('email')
                                            <div class="help-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-grp">
                                        <input name="phone" type="text" placeholder="Số điện thoại của bạn *" value="{{ old('phone') }}">
                                        @error('phone')
                                            <div class="help-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-grp">
                                        <input name="address" type="text" placeholder="Địa chỉ của bạn *" value="{{ old('address') }}">
                                        @error('address')
                                            <div class="help-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-grp">
                                        <select name="gender" class="form-control">
                                            <option value="1">Nam</option>
                                            <option value="0">Nữ</option>
                                        </select>
                                    </div>
                                    <div class="form-grp">
                                        <input name="password" type="password" placeholder="Mật khẩu của bạn *">
                                        @error('password')
                                            <div class="help-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-grp">
                                        <input name="confirm_password" type="password" placeholder="Nhập lại mật khẩu *">
                                        @error('confirm_password')
                                            <div class="help-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <button type="submit">Tạo tài khoản</button>
                                </div>
                            </form>
                            <p class="ajax-response mb-0"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact-area-end -->

</main>
<!-- main-area-end -->


@endsection --}}

<!DOCTYPE html>
<html>
<head>
    <base href="/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Người dùng | Đăng ký</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="ad_assets/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="ad_assets/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="ad_assets/plugins/iCheck/square/blue.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>Đăng ký tài khoản</b></a>
    </div>

    <div class="login-box-body">
        <form action="{{ route('account.check_register') }}" method="post">
            @csrf

            @if (Session::has('error'))
                <div class="alert alert-danger">{{ Session::get('error') }}</div>
            @endif

            <!-- Họ tên -->
            <div class="form-group has-feedback">
                <input type="text" name="name" class="form-control" placeholder="Họ và tên" value="{{ old('name') }}">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                @error('name') <small class="help-block text-danger">{{ $message }}</small> @enderror
            </div>

            <!-- Email -->
            <div class="form-group has-feedback">
                <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                @error('email') <small class="help-block text-danger">{{ $message }}</small> @enderror
            </div>

            <!-- Số điện thoại -->
            <div class="form-group has-feedback">
                <input type="text" name="phone" class="form-control" placeholder="Số điện thoại" value="{{ old('phone') }}">
                <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
                @error('phone') <small class="help-block text-danger">{{ $message }}</small> @enderror
            </div>

            <!-- Địa chỉ -->
            <div class="form-group has-feedback">
                <input type="text" name="address" class="form-control" placeholder="Địa chỉ" value="{{ old('address') }}">
                <span class="glyphicon glyphicon-home form-control-feedback"></span>
                @error('address') <small class="help-block text-danger">{{ $message }}</small> @enderror
            </div>

            <!-- Giới tính -->
            <div class="form-group">
                <label>Giới tính:</label><br>
                <label class="radio-inline">
                    <input type="radio" name="gender" value="1" {{ old('gender') == 1 ? 'checked' : '' }}> Nam
                </label>
                <label class="radio-inline">
                    <input type="radio" name="gender" value="0" {{ old('gender') == 0 ? 'checked' : '' }}> Nữ
                </label>
                @error('gender') <br><small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <!-- Mật khẩu -->
            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder="Mật khẩu">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @error('password') <small class="help-block text-danger">{{ $message }}</small> @enderror
            </div>

            <!-- Nhập lại mật khẩu -->
            <div class="form-group has-feedback">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Nhập lại mật khẩu">
                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            </div>

            <div class="row">
                <div class="col-xs-8">
                    <a href="{{ route('account.login') }}">Đã có tài khoản? Đăng nhập</a>
                </div>
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Đăng ký</button>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>
