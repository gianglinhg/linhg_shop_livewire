<x-guest-layout>
    <x-slot name="title">
        {{ $title }}
    </x-slot>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="col-sm-12">
        <div class="wrapper-page">
            <div class="m-t-40 account-pages">
                <div class="text-center account-logo-box">
                    <h2 class="text-uppercase">
                        <a href="/" class="text-success">
                            {{-- <span><img src="template/assets/images/logo.png" alt="" height="36"></span> --}}
                        </a>
                    </h2>
                    <h4 class="text-uppercase font-bold m-b-0 text-white">Sign In</h4>
                </div>
                <div class="account-content">
                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <!-- Email Address -->
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="email" name="email" required="" value="{{ old('email') }}" placeholder="Nhập Email xác nhận" autocomplete="email">
                            </div>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div class="form-group account-btn text-center m-t-10">
                            <div class="col-xs-12">
                                <button class="btn w-md btn-bordered btn-danger waves-effect waves-light" type="submit">Confirm</button>
                            </div>
                        </div>
                    </form>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
