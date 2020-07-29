@extends('pelanggan.layout.default')

@section('content')
<br>
<br>
<br>
<br>
<div class="login-register-area pt-85 pb-90">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                <div class="login-register-wrapper">
                    <div class="login-register-tab-list nav">
                        <a class="active" data-toggle="tab" href="#lg1">
                            <h4> login </h4>
                        </a>
                        <a href="/pelanggan/registerKu">
                            <h4> register </h4>
                        </a>
                    </div>
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form action="{{ route('login') }}" method="post">
                                        @csrf
                                        @error('email')
                                            <span class="text-danger">{{ $message }}
                                            </span>
                                        @enderror
                                        <input type="email" name="email" placeholder="E-Mail">

                                        @error('password')
                                            <span class="text-danger">{{ $message }}
                                            </span>
                                        @enderror
                                        <input type="password" name="password" placeholder="Password">

                                        <input class="form-check-input mb-4" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            Ingat Saya
                                        </label>
                                        <div class="button-box">
                                            {{-- <div class="login-toggle-btn">
                                                <input type="checkbox">
                                                <label>Remember me</label>
                                                <a href="#">Forgot Password?</a>
                                            </div> --}}
                                            <button type="submit">Login</button>
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Lupa Password?') }}
                                            </a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
