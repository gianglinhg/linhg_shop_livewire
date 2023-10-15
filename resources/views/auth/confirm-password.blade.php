<x-guest-layout>
    <x-slot name="title">
        {{ $title }}
    </x-slot>

    <div class="mb-4 text-sm text-gray-600">
        {{ __('Vui lòng xác nhận mật khẩu của bạn trước khi tiếp tục!') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf
        <div class="form-group ">
            <div class="col-xs-12">
                <input class="form-control" type="password" name="password" required="" placeholder="Nhập mật khẩu" autocomplete="current-password">
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        {{-- <div class="flex justify-end mt-4">
            <x-primary-button>
                {{ __('Xác nhận') }}
            </x-primary-button>
        </div> --}}

        
        <div class="form-group account-btn text-center m-t-10">
            <div class="col-xs-12">
                <button class="btn w-md btn-bordered btn-danger waves-effect waves-light" type="submit">Confirm</button>
            </div>
        </div>
    </form>
</x-guest-layout>