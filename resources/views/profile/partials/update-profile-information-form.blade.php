<section>
    <header>
        <h4 class="header-title m-t-0">{{ __('Thông tin') }}</h4>
        <p class="text-muted font-13 m-b-10">
            {{ __("Cập nhật thông tin và ảnh đại diện của bạn") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="form-group">
            <img src="{{asset('/storage/users/'.$user->avatar)}}" width="100px">
            <label for="userName">Avatar</label>
            <input type="file" name="avatar" class="form-control" id="userName">
            <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
        </div>
        <div class="form-group">
            <label for="userName">User Name</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" parsley-trigger="change" required="" placeholder="Enter user name" class="form-control" id="userName">
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" name="email" parsley-trigger="change" value="{{ old('name', $user->email) }}" required="" placeholder="Enter email" class="form-control" id="emailAddress">
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>
        <div class="form-group text-right m-b-0">
            <button class="btn btn-primary waves-effect waves-light" type="submit">
                Submit
            </button>
        </div>
    </form>
</section>