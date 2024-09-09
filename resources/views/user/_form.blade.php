<form action="{{ route('admin.user.store') }}" method="POST">
    <input type="hidden" name="method" value="{{ $method ?? 'save' }}">
    @csrf

    <div class="form-group">
        <x-input-label for="name" :value="__('Username')" />
        <x-text-input id="name" name="name" type="text" :value="__('')" />
    </div>
    <div class="form-group mt-2">
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" name="email" type="mail" :value="__('')" />
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group mt-2">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" name="password" type="password" :value="__('')" />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mt-2">
                <x-input-label for="password_retype" :value="__('Password Retype')" />
                <x-text-input id="password_retype" name="password_retype" type="password" :value="__('')" />
            </div>
        </div>
    </div>
    <x-primary-button class="mt-5">{{ $button ?? __('Save') }}</x-primary-button>
</form>