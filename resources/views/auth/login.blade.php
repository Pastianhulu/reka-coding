@extends('layouts.public')
@section('body-class', 'blog-page')
@section('content-header')
@section('header-class', 'sticky-top')

    
    <style>
        .login-wrap {
            min-height: calc(100vh - 160px);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem 1rem;
        }

        .login-container {
            font-family: "Poppins", sans-serif;
            width: 800px;
            display: flex;
            border-radius: 20px;
            overflow: hidden;
            background: white;
        }

        .left-panel {
            width: 50%;
            background: linear-gradient(120deg, #1c08cd, #020416);
            border-radius: 20px 100px 100px 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 40px 20px;
            color: white;
        }

        
        .logo-wrap img {
            height: 150px;
            width: auto;
        }
        

        .right-panel {
            width: 50%;
            padding: 40px 30px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: white;
        }

        .btn-login {
            background: linear-gradient(135deg, #06172c, #1c08cd);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            transition: opacity 0.3s;
            padding: 10px;
        }

        .btn-login:hover {
            opacity: 0.85;
            color: white;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #1a73e8;
        }

        @media screen and (max-width: 768px) {
            
            .login-container {
                width: 95%;
                flex-direction: column;
                border-radius: 10px;
            }

            .left-panel {
                width: 100%;
                order: 2;
                border-radius: 0 0 10px 10px;
                padding: 25px 15px;
            }

            .left-panel img {
                max-width: 80px;
            }

            .logo-wrap img {
                height: 110px;
            }

            .right-panel {
                width: 100%;
                order: 1;
                border-radius: 10px 10px 0 0;
                padding: 25px 20px;
            }
        }
    </style>

    <div class="login-wrap">
        <div class="login-container shadow-lg">
            <div class="left-panel">
                <div class="logo-wrap mb-3">
                    <img src="{{ asset('gambar/logo/logo-bg.jpg') }}" alt="REKAC Coding">
                </div>
                <h3 class="font-weight-bold text-white">REKA CODING</h3>
                <h6 class="text-white">Menyediakan soruce code dan layanan pembuat website </h6>
                <a href="#"><i class="fa fa-phone"></i> Call HP : 0822-2222-2222</a>
            </div>

            <div class="right-panel">
                <h4 class="font-weight-bold mb-4">LOGIN - Welcome Back!</h4>
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <label for="email" class="form-label" >Username</label>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fas fa-user"></i>
                            </div>
                        </div>
                        <input type="text" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email/Username" required autocomplete="off" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <label class="font-weight-bold">Password</label>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fas fa-lock"></i>
                            </div>
                        </div>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-login w-100 mb-2">LOG IN</button>
                    <div class="text-center text-muted mb-2"> or </div>

                    <div class="row">
                        <div class="col-6">
                            <a href="#" class="btn btn-outline-danger btn-block">
                                <i class="bi bi-google mr-2"></i>Google
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="#" class="btn btn-outline-dark btn-block">
                                <i class="bi bi-github mr-2"></i>Github
                            </a>
                        </div>
                    </div>

                    <p class="text-center text-muted small mt-3 mb-0">
                        <i class="fas fa-shield-alt mr-1"></i>
                        Dengan masuk, Anda menyetujui
                        <a href="#" style="color: blue;">Syarat & Ketentuan</a> serta
                        <a href="#" style="color: blue;">Kebijakan Privasi</a> kami
                    </p>
                </form>
            </div>
        </div>
    </div>

@endsection
