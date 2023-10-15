<x-guest-layout>
    <x-slot name="title">
        {{ $title ?? 'Verify-email' }}
    </x-slot>

    {{-- <div class="mb-4 text-sm text-gray-600">
        {{ __('Cảm ơn bạn đã đăng ký! Trước khi bắt đầu, bạn có thể xác minh địa chỉ email của mình bằng cách nhấp vào
        liên kết chúng tôi vừa gửi cho bạn qua email không? Nếu bạn không nhận được email, chúng tôi sẽ sẵn lòng gửi cho
        bạn một email khác.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
    <div class="mb-4 font-medium text-sm text-green-600">
        {{ __('Một liên kết xác minh mới đã được gửi đến địa chỉ email bạn đã cung cấp trong quá trình đăng ký.') }}
    </div>
    @endif --}}
    <div class="col-sm-12">

        <div class="wrapper-page">

            <div class="m-t-40 account-pages">
                <div class="text-center account-logo-box">
                    <h2 class="text-uppercase">
                        <a href="/" class="text-success">
                            {{-- <span><img src="template/assets/images/logo.png" alt="" height="36"></span> --}}
                        </a>
                    </h2>
                    <h4 class="text-uppercase font-bold m-b-0 text-white">Thay đổi mật khẩu</h4>
                </div>
                <div class="account-content">
                    <form class="form-horizontal" method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <div class="form-group account-btn text-center m-t-10">
                            <div class="col-xs-12">
                                <button class="btn w-md btn-danger btn-bordered waves-effect waves-light" type="submit">Gửi lại email xác minh</button>
                            </div>
                        </div>

                    </form>

                    <div class="clearfix"></div>

                </div>
            </div>
            <!-- end card-box-->

            <div class="row m-t-50">
                <div class="col-sm-12 text-center">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <p class="text-muted">Bạn muốn thoát?<a href="#" class="text-primary m-l-5" onclick="event.preventDefault();
                            this.closest('form').submit();">"><b>Đăng xuất</b></a></p>
                    </form>
                </div>
            </div>

        </div>
        <!-- end wrapper -->

    </div>
</x-guest-layout>