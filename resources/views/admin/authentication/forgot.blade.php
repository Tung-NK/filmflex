@extends('admin.layout.default')

@section('title')
    @parent Forgot Password
@endsection

<div class="sign section--bg" data-bg="{{ asset('assets_admin/img/section/section.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="sign__content">
                    <!-- forgot form -->
                    <form id="forgotPassForm" action="{{ route('forgotPassPost') }}" class="sign__form" method="post">
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

                        <div class="sign__group">
                            <input type="email" name="email" id="email" class="sign__input" placeholder="Email">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <span id="errorMessage" class="text-danger mt-2" style="display: none;"></span>
                        </div>

                        <div class="sign__group sign__group--checkbox">
                            <input id="remember" name="remember" type="checkbox" checked="checked">
                            <label for="remember">I agree to the <a href="#">Privacy Policy</a></label>
                        </div>

                        <button class="sign__btn" type="submit">Send</button>

                        <span class="sign__text">We will send a password to your Email</span>
                    </form>
                    <!-- end forgot form -->
                </div>
            </div>
        </div>
    </div>
</div>

@section('script')
    <script>
        document.getElementById('forgotPassForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const emailInput = document.getElementById('email');
            const errorMessage = document.getElementById('errorMessage');
            const agreeCheckbox = document.getElementById('remember'); 
            errorMessage.style.display = 'none';


            if (!emailInput.value.trim()) {
                errorMessage.textContent = 'Vui lòng nhập địa chỉ email.';
                errorMessage.style.display = 'block';
                return;
            }

            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(emailInput.value)) {
                errorMessage.textContent = 'Vui lòng nhập địa chỉ email hợp lệ.';
                errorMessage.style.display = 'block';
                return;
            }

            if (!agreeCheckbox.checked) {
            errorMessage.textContent = 'Vui lòng đồng ý với chính sách quyền riêng tư.';
            errorMessage.style.display = 'block';
            return;
        }

            this.submit();
        });
    </script>
@endsection
