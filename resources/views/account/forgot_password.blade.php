<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quên mật khẩu</title>
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
                                <h3>Quên mật khẩu</h3>
                            </div>
                            <p class="text-muted">Nhập địa chỉ email của bạn và chúng tôi sẽ gửi cho bạn một liên kết để đặt lại mật khẩu của bạn.</p>

                            <form method="POST" action="{{ route('account.check_forgot_password') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email của bạn <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Gửi link đặt lại mật khẩu</button>
                                <a href="{{ route('account.login') }}" class="btn btn-link">Quay lại đăng nhập</a>
                            </form>
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
