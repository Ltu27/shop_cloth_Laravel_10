<div class="modal" id="my-Register">
    <a href="#" class="overlay-close"></a>
    <div class="authen-modal register">
        <h3 class="authen-modal__title">Đăng Kí</h3>
        <button type="button" class="close-modal-btn">&times;</button>
        <form id="register-form">
            @csrf
            <div class="form-columns" style="display: flex; gap: 20px;">
                <!-- Cột trái -->
                <div class="form-left" style="flex: 1;">
                    <div class="form-group">
                        <label for="name" class="form-label">Tên tài khoản *</label>
                        <input id="name" name="name" type="text" value="{{ old('name') }}" class="form-control">
                        @error('name') <small class="form-message">{{ $message }}</small> @enderror
                        <span class="form-message"></span>
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-label">Email *</label>
                        <input id="register-email" name="email" type="text" value="{{ old('email') }}" class="form-control">
                        @error('email') <small class="form-message">{{ $message }}</small> @enderror
                        <span class="form-message"></span>
                    </div>
                    <div class="form-group">
                        <label for="password" class="form-label">Mật khẩu *</label>
                        <input id="register-password" name="password" type="password" class="form-control">
                        @error('password') <small class="form-message">{{ $message }}</small> @enderror
                        <span class="form-message"></span>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation" class="form-label">Nhập lại mật khẩu *</label>
                        <input id="password_confirmation" name="password_confirmation" type="password" class="form-control">
                        <span class="form-message"></span>
                    </div>
                </div>

                <!-- Cột phải -->
                <div class="form-right" style="flex: 1;">
                    <div class="form-group">
                        <label for="phone" class="form-label">Số điện thoại *</label>
                        <input id="phone" name="phone" type="text" value="{{ old('phone') }}" class="form-control">
                        @error('phone') <small class="form-message">{{ $message }}</small> @enderror
                        <span class="form-message"></span>
                    </div>
                    <div class="form-group">
                        <label for="address" class="form-label">Địa chỉ *</label>
                        <input id="address" name="address" type="text" value="{{ old('address') }}" class="form-control">
                        @error('address') <small class="form-message">{{ $message }}</small> @enderror
                        <span class="form-message"></span>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Giới tính *</label><br>
                        <label><input type="radio" name="gender" value="1" checked> Nam</label>
                        <label><input type="radio" name="gender" value="0"> Nữ</label>
                        <span class="form-message"></span>
                    </div>
                </div>
            </div>
            <div class="authen__btns">
                <div class="btn btn--default" id="btn-register">Đăng Kí</div>
            </div>
        </form>
    </div>
</div>
