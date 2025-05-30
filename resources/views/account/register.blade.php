<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/components/logins/login-4/assets/css/login-4.css">
</head>
<body>
<section class="p-3 p-md-4 p-xl-5">
    <div class="container">
        <div class="card border-light-subtle shadow-sm">
            <div class="row g-0">
                <div class="col-12 col-md-6">
                    <img class="img-fluid rounded-start w-100 h-100 object-fit-cover"
                         src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                         alt="Register Image">
                </div>
                <div class="col-12 col-md-6">
                    <div class="card-body p-3 p-md-4 p-xl-5">
                        <div class="mb-5">
                            <h3>Đăng ký</h3>
                        </div>
                        <form action="{{ route('account.check_register') }}" method="POST">
                            @csrf
                            <div class="row gy-3 gy-md-4">
                                <div class="col-12">
                                    <label for="name" class="form-label">Tên người dùng <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                                    @error('name') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-12">
                                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">
                                    @error('email') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-12">
                                    <label for="phone" class="form-label">Số điện thoại <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="phone" id="phone" value="{{ old('phone') }}">
                                    @error('phone') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-12">
                                    <label for="address" class="form-label">Địa chỉ <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="address" id="address" value="{{ old('address') }}">
                                    @error('address') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Giới tính <span class="text-danger">*</span></label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="male" value="1" {{ old('gender') == 1 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="male">Nam</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="female" value="0" {{ old('gender') == 0 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="female">Nữ</label>
                                    </div>
                                    @error('gender') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-12">
                                    <label for="password" class="form-label">Mật khẩu <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" name="password" id="password">
                                    @error('password') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-12">
                                    <label for="password_confirmation" class="form-label">Nhập lại mật khẩu <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                                    @error('password_confirmation') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-12">
                                    <div class="d-grid">
                                        <button class="btn bsb-btn-xl btn-primary" type="submit">Đăng ký</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <hr class="mt-5 mb-4 border-secondary-subtle">
                        <div class="d-flex gap-2 justify-content-md-end">
                            <a href="{{ route('account.login') }}" class="link-secondary">Bạn đã có tài khoản?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>
