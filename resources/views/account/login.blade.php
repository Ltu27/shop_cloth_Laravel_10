<div class=" modal" id="my-Login">
  <a href="#" class="overlay-close"></a>
  <div class="authen-modal login">
      <h3 class="authen-modal__title">Đăng Nhập</h3>
      <div class="form-group">
          <label for="email" class="form-label">Email *</label>
          <input id="email" name="email" type="text" class="form-control">
          @error('email') <small class="form-message">{{ $message }}</small> @enderror
          <span class="form-message"></span>
      </div>
      <div class="form-group">
          <label for="password" class="form-label">Mật khẩu *</label>
          <input id="password" name="password" type="password" class="form-control">
          <span class="form-message"></span>
      </div>
      <div class="authen__btns">
          <div class="btn btn--default">Đăng Nhập</div>
          <input type="checkbox" class="authen-checkbox">
          <label class="form-label">Ghi nhớ mật khẩu</label>
      </div>
      <a class="authen__link">Quên mật khẩu ?</a>
  </div>
</div>