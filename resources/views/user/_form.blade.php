<form action="{{ route('admin.user.store') }}" method="POST" >
    <input type="hidden" name="method" value="{{ $method ?? 'save' }}">
    @csrf

    <div class="">
        <label for="name" class="form-label">{{ __('Username') }}</label>
        <input type="text" id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class=" mt-2">
        <label for="email" class="form-label">{{ __('Email') }}</label>
        <input type="text"  id="email" name="email" type="mail" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror">
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="row mt-2">
        <div class="col-md-6">
            <x-input-label for="password" :value="__('Password')" />
            <div class="input-group">
                <input type="password" id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror" />
                <span class="input-group-text">
                    <i class="bi bi-eye-slash" id="togglePassword"></i>
                </span>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <x-input-label for="password_confirmation" :value="__('Password Retype')" />
            <div class="input-group">
                <input type="password" id="password_confirmation" name="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" />
                <span class="input-group-text">
                    <i class="bi bi-eye-slash" id="togglePasswordRetype"></i>
                </span>
                @error('password_confirmation')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
    <x-primary-button class="mt-5" type="submit">{{ $button ?? __('Save') }}</x-primary-button>
</form>

@push('scripts')
<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');
    togglePassword.addEventListener('click', () => {
        // Toggle the type attribute using
        // getAttribure() method
        const passwordType = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', passwordType);
    });

    const togglePasswordRetype = document.querySelector('#togglePasswordRetype');
    const passwordRetype = document.querySelector('#password_confirmation');
    togglePasswordRetype.addEventListener('click', () => {
        // Toggle the type attribute using
        // getAttribure() method
        const passwordRetypeType = passwordRetype.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordRetype.setAttribute('type', passwordRetypeType);
    });
</script>
@endpush