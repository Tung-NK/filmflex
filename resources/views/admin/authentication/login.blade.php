@extends('admin.layout.default')

@section('title')
    @parent Login
@endsection

<div class="sign section--bg" data-bg="{{ asset('assets_admin/img/section/section.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="sign__content">
                    <!-- authorization form -->
                    <form id="loginForm" action="#" method="POST" class="sign__form">
                        @csrf
                        <a href="index.html" class="sign__logo">
                            <img src="{{ asset('assets_admin/img/logo2.svg') }}" alt="">
                        </a>

                        <div id="login-alert"></div>

                        <div class="sign__group">
                            <input type="email" name="email" id="email" class="sign__input" placeholder="Email">

                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="sign__group">
                            <input type="password" name="password" id="password" class="sign__input"
                                placeholder="Password">

                            <div class="invalid-feedback"></div>

                        </div>


                        <div class="sign__group sign__group--checkbox">
                            <input id="remember" name="remember" type="checkbox" checked="checked">
                            <label for="remember">Remember Me</label>
                        </div>

                        <button class="sign__btn" value="Login" type="submit" id="loginBtn">Sign in</button>

                        <span class="sign__delimiter">or</span>

                        <div class="sign__social">
                            <a class="fb" href="#">Sign in with<i class="ti ti-brand-facebook"></i></a>
                            <a class="tw" href="#">Sign in with<i class="ti ti-brand-x"></i></a>
                            <a class="gl" href="#">Sign in with<i class="ti ti-brand-google"></i></a>
                        </div>

                        <span class="sign__text">Don't have an account? <a href="signup.html">Sign up!</a></span>

                        <span class="sign__text"><a href="forgot.html">Forgot password?</a></span>
                    </form>
                    <!-- end authorization form -->
                </div>
            </div>
        </div>
    </div>
</div>


@section('script')
    <script>
        $(function() {
            $("#loginForm").submit(function(e) {
                e.preventDefault();

                const email = $("#email").val();
                const password = $("#password").val();

                let isCheck = true;

                if (!email) {
                    showError('email', "Không bỏ trống email")
                    isCheck = false;
                }else if(email == /^[^\s@]+@[^\s@]+\.[^\s@]+$/){
                    showError('email', "Không đúng định dạng")
                }

                if (!password) {
                    showError('password', "Không bỏ trống password")
                    isCheck = false;
                }


                if (isCheck) {
                    $("#loginBtn").val('Pleas wait ....');
                    $.ajax({
                        url: '{{ route('postLogin') }}',
                        method: 'post',
                        data: $(this).serialize(),
                        dataType: 'json',
                        success: function(res) {
                            console.log(res);

                            if (res.status == 400) {
                                showError('email', res.messages.email);
                                showError('password', res.messages.password);
                                $("#loginBtn").val('Login');
                            } else if (res.status == 403 || res.status == 401 || res.status ==
                                404) {
                                $("#login-alert").html(showMessage('danger', res.messages));
                                $("#loginBtn").val('Login');
                            } else {
                                if (res.status == 200 && res.messages == 'success') {
                                    window.location = '{{ route('movie.catalog.index') }}'
                                }
                            }
                        }
                    });
                }
            });
        });
    </script>
@endsection


{{-- @push('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#loginForm').submit(function (e){
            e.preventDefault(); // Ngăn chặn hành động mặc định của form

            $('.text-danger').remove(); // Xóa các thông báo lỗi trước đó

            var email = $('#email').val();
            var password = $('#password').val();
            var hasError = false;

            // Kiểm tra dữ liệu đầu vào
            if (!email) {
                $('#email').after('<span class="text-danger">Email is required</span>');
                hasError = true;
            }
            if (!password) {
                $('#password').after('<span class="text-danger">Password is required</span>');
                hasError = true;
            }

            // Nếu không có lỗi, thực hiện gửi dữ liệu qua AJAX
            if (!hasError) {
                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'), // Lấy URL từ thuộc tính action của form
                    data: $(this).serialize(), // Serialize dữ liệu của form
                    success: function(response) {
                        // Xử lý phản hồi thành công từ server
                        // Ví dụ: chuyển hướng đến trang khác
                        window.location.href = response.redirect; // Giả sử server trả về một URL để chuyển hướng
                    },
                    error: function(xhr) {
                        // Xử lý lỗi từ server
                        var errors = xhr.responseJSON.errors;
                        if (errors) {
                            $.each(errors, function(key, value) {
                                $('#' + key).after('<span class="text-danger">' + value[0] + '</span>');
                            });
                        }
                    }
                });
            }
        });
    });
</script>
@endpush --}}
