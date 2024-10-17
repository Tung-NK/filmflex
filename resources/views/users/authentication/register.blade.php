@extends('users.layout.default')
<div class="sign section--bg" data-bg="{{ asset('assets_user/img/bg/section__bg.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="sign__content">
                    <!-- registration form -->
                    <form action="" class="sign__form" method="post">
                        @csrf
                        <a href="index.html" class="sign__logo">
                            <img src="{{ asset('assets_user/img/logo2.svg')}}" alt="" style="height: 110px">
                        </a>

                        <div class="sign__group">
                            <input type="text" class="sign__input mb-1 @error('name') is-invalid @enderror" placeholder="Name" name="name">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="sign__group">
                            <input type="text" class="sign__input mb-1 @error('email') is-invalid @enderror" placeholder="Email" name="email">
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="sign__group">
                            <input type="password" class="sign__input mb-1 @error('password') is-invalid @enderror" placeholder="Password" name="password">
                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="sign__group sign__group--checkbox">
                            <input id="remember" name="remember" type="checkbox" checked="checked">
                            <label for="remember">I agree to the <a href="privacy.html">Privacy Policy</a></label>
                        </div>

                        <button class="sign__btn" type="submit">Sign up</button>

                        <span class="sign__delimiter">or</span>

                        <div class="sign__social">
                            <a class="fb" href="#">Sign up with<i class="ti ti-brand-facebook"></i></a>
                            <a class="tw" href="#">Sign up with<i class="ti ti-brand-x"></i></a>
                            <a class="gl" href="#">Sign up with<i class="ti ti-brand-google"></i></a>
                        </div>

                        <span class="sign__text">Already have an account? <a href="signin.html">Sign in!</a></span>
                    </form>
                    <!-- registration form -->
                </div>
            </div>
        </div>
    </div>
</div>