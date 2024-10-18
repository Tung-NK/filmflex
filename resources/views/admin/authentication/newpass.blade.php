@extends('admin.layout.default')

@section('title')
    @parent Reset Password
@endsection

<div class="sign section--bg" data-bg="{{ asset('assets_admin/img/section/section.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="sign__content">
                    <!-- forgot form -->
                    <form id="resetPassForm" action="{{ route('resetPostPass') }}" class="sign__form" method="post">
                        <a href="index.html" class="sign__logo">
                            <img src="{{ asset('assets_admin/img/logo2.svg') }}" alt="">
                        </a>
                        @csrf
                        @if (session('messageErr'))
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                {{ session('messageErr') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <input type="text" hidden name="token" value="token">

                        <div class="sign__group">
                            <input type="email" name="email" id="email" class="sign__input" placeholder="Email">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <span id="errorMessage" class="text-danger mt-2" style="display: none;"></span>
                        </div>

                        <div class="sign__group">
                            <input type="password" name="password" id="password" class="sign__input"
                                placeholder="Password">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <span id="errorMessage" class="text-danger mt-2" style="display: none;"></span>
                        </div>

                        <div class="sign__group">
                            <input type="password" name="passCf" id="passCf" class="sign__input"
                                placeholder="Confirm Password">
                            @error('passCf')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <span id="errorMessage" class="text-danger mt-2" style="display: none;"></span>
                        </div>

                        <button class="sign__btn" type="submit">Reset Password</button>

                    </form>
                    <!-- end forgot form -->
                </div>
            </div>
        </div>
    </div>
</div>

@section('script')
    <script>
        document.getElementById('resetPassForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const emailInput = document.getElementById('email');
            const passwordInput = document.getElementById('password');
            const passCfInput = document.getElementById('passCf');
            const errorMessages = document.querySelectorAll('.text-danger');

            errorMessages.forEach(msg => msg.style.display = 'none');

            let hasError = false;

            if (!emailInput.value.trim()) {
                showError(emailInput, 'Vui lòng nhập địa chỉ email.');
                hasError = true;
            } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailInput.value)) {
                showError(emailInput, 'Vui lòng nhập địa chỉ email hợp lệ.');
                hasError = true;
            }

            if (!passwordInput.value.trim()) {
                showError(passwordInput, 'Vui lòng nhập mật khẩu.');
                hasError = true;
            } else if (passwordInput.value.length < 6) {
                showError(passwordInput, 'Mật khẩu phải có ít nhất 6 ký tự.');
                hasError = true;
            }

            if (!passCfInput.value.trim()) {
                showError(passCfInput, 'Vui lòng xác nhận mật khẩu.');
                hasError = true;
            } else if (passCfInput.value !== passwordInput.value) {
                showError(passCfInput, 'Mật khẩu xác nhận không khớp.');
                hasError = true;
            }

            if (!hasError) this.submit();

            function showError(input, message) {
                const errorElement = input.nextElementSibling;
                errorElement.textContent = message;
                errorElement.style.display = 'block';
            }
        });
    </script>
@endsection
