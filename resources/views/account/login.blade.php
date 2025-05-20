<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/components/logins/login-4/assets/css/login-4.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>

</head>
<body>
    <section class="p-3 p-md-4 p-xl-5">
        <div class="container">
            <div class="card border-light-subtle shadow-sm">
                <div class="row g-0">
                    <div class="col-12 col-md-6">
                        <img class="img-fluid rounded-start w-100 h-100 object-fit-cover"
                            src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                            alt="Login Image">
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="card-body p-3 p-md-4 p-xl-5">
                            <div class="mb-5">
                                <h3>Đăng nhập</h3>
                            </div>

                            <form action="{{ route('account.check_login') }}" method="POST">
                                @csrf
                                <div class="row gy-3 gy-md-4">
                                    <div class="col-12">
                                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" name="email" id="email"
                                            value="{{ old('email') }}">
                                            @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="password" class="form-label">Mật khẩu <span class="text-danger">*</span></label>
                                        <input type="password" class="form-control" name="password" id="password">
                                        @error('password')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                            <label class="form-check-label text-secondary" for="remember">
                                                Ghi nhớ tài khoản
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button class="btn bsb-btn-xl btn-primary" type="submit">Đăng nhập</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <hr class="mt-5 mb-4 border-secondary-subtle">
                            <div class="d-flex gap-2 justify-content-md-end">
                                <a href="{{ route('account.register') }}" class="link-secondary">Đăng ký</a>
                                <a href="#" class="link-secondary">Quên mật khẩu?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if(Session::has('ok'))
        <script>
            $.toast({
                heading: 'Thông báo',
                text: '{{ Session::get('ok') }}',
                showHideTransition: 'slide',
                icon: 'success',
                position: 'top-center',        
            })
        </script>
        @endif

        @if(Session::has('no'))

        <script>
            $.toast({
                heading: 'Thông báo',
                text: '{{ Session::get('no') }}',
                showHideTransition: 'slide',
                icon: 'error',
                position: 'top-center',        
            })
        </script>
        @endif
</body>
</html>
