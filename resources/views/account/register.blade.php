{{-- <div class="login-box">
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
</div> --}}

<div class="modal" id="my-Register">
    <a href="#" class="overlay-close"></a>
    <div class="authen-modal register">
        <h3 class="authen-modal__title">Đăng Kí</h3>
        <div class="form-group">
            <label for="name" class="form-label">Tên tài khoản *</label>
            <input id="name" name="name" type="text" value="{{ old('name') }}" class="form-control">
            @error('name') <small class="form-message">{{ $message }}</small> @enderror
            <span class="form-message"></span>
        </div>
        <div class="form-group">
            <label for="email" class="form-label">Email *</label>
            <input id="email" name="email" type="text" value="{{ old('email') }}" class="form-control">
            @error('email') <small class="form-message">{{ $message }}</small> @enderror
            <span class="form-message"></span>
        </div>
        <div class="form-group">
            <label for="password" class="form-label">Mật khẩu *</label>
            <input id="password" name="password" type="password" class="form-control">
            @error('password') <small class="form-message">{{ $message }}</small> @enderror
            <span class="form-message"></span>
        </div>
        <div class="form-group">
            <label for="password_confirmation" class="form-label">Nhập lại mật khẩu *</label>
            <input id="password_confirmation" name="password_confirmation" type="password" class="form-control">
            <span class="form-message"></span>
        </div>
        <div class="authen__btns">
            <div class="btn btn--default">Đăng Kí</div>
        </div>
    </div>
</div>
