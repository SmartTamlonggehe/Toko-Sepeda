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
                        <a data-toggle="tab" href="#lg1">
                            <h4> login </h4>
                        </a>
                        <a data-toggle="tab" class="active" href="#lg2">
                            <h4> register </h4>
                        </a>
                    </div>
                    <div class="tab-content">
                        <div id="lg2" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <input type="text" name="name" placeholder="Nama">
                                        <input type="email" name="email" placeholder="Email">
                                        <input type="password" name="password" placeholder="Password">
                                        <input type="password" id="password-confirm" name="password_confirmation" placeholder="Ulangi Password">

                                        <div class="button-box">
                                            <button type="submit">Daftar</button>
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
