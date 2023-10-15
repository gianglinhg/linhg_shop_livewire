<section>

    <header>
        <h4 class="header-title m-t-0">{{ __('Cập nhật mật khẩu') }}</h4>
        <p class="text-muted font-13 m-b-10">
            {{ __('Đảm bảo tài khoản của bạn đang sử dụng mật khẩu dài, ngẫu nhiên để giữ an toàn.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="form-group">
            <label for="current_password">Mật khẩu hiện tại</label>
            <input type="password" name="current_password" class="form-control" id="current_password">
            <x-input-error class="mt-2" :messages="$errors->get('current_password')" />
        </div>

        <div class="form-group">
            <label for="password">Mật khẩu mới</label>
            <input type="password" name="password" class="form-control" id="password">
            <x-input-error class="mt-2" :messages="$errors->get('password')" />
        </div>
        <div class="form-group">
            <label for="password_confirmation">Mật khẩu mới</label>
            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
            <x-input-error class="mt-2" :messages="$errors->get('password_confirmation')" />
        </div>

        <div class="form-group text-right m-b-0">
            <button class="btn btn-primary waves-effect waves-light" type="submit">
                Submit
            </button>
            @if (session('status') === 'password-updated')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                class="text-sm text-gray-600">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>