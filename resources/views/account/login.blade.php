<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
                         src="{{ asset('assets/img/logo-img-1.webp') }}"
                         alt="Login Image">
                </div>
                <div class="col-12 col-md-6">
                    <div class="card-body p-3 p-md-4 p-xl-5">
                        <div class="mb-5">
                            <h3>Log in</h3>
                        </div>

                        {{-- Hiển thị lỗi --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

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
                                    <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" name="password" id="password">
                                </div>
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                        <label class="form-check-label text-secondary" for="remember">
                                            Keep me logged in
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-grid">
                                        <button class="btn bsb-btn-xl btn-primary" type="submit">Log in now</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <hr class="mt-5 mb-4 border-secondary-subtle">
                        <div class="d-flex gap-2 justify-content-md-end">
                            <a href="#" class="link-secondary">Create new account</a>
                            <a href="#" class="link-secondary">Forgot password</a>
                        </div>

                        <p class="mt-5 mb-4">Or sign in with</p>
                        <div class="d-flex gap-3 flex-column flex-xl-row">
                            <a href="#" class="btn bsb-btn-xl btn-outline-primary">Google</a>
                            <a href="#" class="btn bsb-btn-xl btn-outline-primary">Facebook</a>
                            <a href="#" class="btn bsb-btn-xl btn-outline-primary">Twitter</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>
