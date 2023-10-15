<x-guest-layout>
    <x-slot name="title">
        {{ $title }}
    </x-slot>
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
                    <form class="form-horizontal" method="POST" action="{{ route('password.store') }}">
                        @csrf

                        <!-- Password Reset Token -->
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        <!-- Email Address -->
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="email" name="email" required="" placeholder="example@gmail.com">
                            </div>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" name="password" type="password" placeholder="Mật khẩu">
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" name="password_confirmation" type="password" placeholder="Xác nhận lại mật khẩu">
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>
                        </div>


                        <div class="form-group account-btn text-center m-t-10">
                            <div class="col-xs-12">
                                <button class="btn w-md btn-danger btn-bordered waves-effect waves-light" type="submit">Confirm</button>
                            </div>
                        </div>

                    </form>

                    <div class="clearfix"></div>

                </div>
            </div>
            <!-- end card-box-->

            <div class="row m-t-50">
                <div class="col-sm-12 text-center">
                    <p class="text-muted">Don't have an account? <a href="{{ route('login') }}" class="text-primary m-l-5"><b>Sign in</b></a></p>
                </div>
            </div>

        </div>
        <!-- end wrapper -->

    </div>

</x-guest-layout>
