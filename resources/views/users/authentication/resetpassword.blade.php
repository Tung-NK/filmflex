@extends('users.layout.default')

<div class="sign section--bg" data-bg="{{ asset('assets_user/img/bg/section__bg.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="sign__content">
                    <!-- authorization form -->
                    <form action="" class="sign__form" method="POST">
                        @csrf
                        <a href="index.html" class="sign__logo">
                            <img src="{{ asset('assets_user/img/logo2.svg')}}" alt="" style="height: 110px">
                        </a>

                        <div class="sign__group">
                            <input type="text" class="sign__input" placeholder="Email" name="email" id="email" value="{{ old('email') }}">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        {{-- Thông báo lỗi --}}
                        @if ($errors->has('error'))
                            <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>	
                                    <strong>{{ $errors->first('error') }}</strong>
                            </div>
                        @endif
                        
                        {{-- Thông báo thành công --}}
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>	
                                    <strong>{{ $message }}</strong>
                            </div>
                        @endif
                        <button class="sign__btn" >Sign in</button>
                        <span class="sign__text">Don't have an account? <a href="{{ route('register') }}">Sign up!</a></span>

                        {{-- <span class="sign__text"><a href="forgot.html">Forgot password?</a></span> --}}
                    </form>
                    <!-- end authorization form -->
                </div>
            </div>
        </div>
    </div>
</div>