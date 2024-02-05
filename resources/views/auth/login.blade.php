{{-- <x-guest-layout> --}}
<!-- Session Status -->
<x-auth-session-status class="mb-4" :status="session('status')" />
<link rel="stylesheet" href="{{ asset('frontend/css/customlogin.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<div class="container" id="container">
    <div class="form-container sign-in">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <!-- Email Address -->
            <h1>Sign in</h1>
            <div class="social-icons">
                <a href="#"><i class="fa-brands fa-google-plus-g gmail"></i></a>
                <a href="#"><i class="fa-brands fa-facebook-f facebook"></i></a>
            </div>
            <span>or use your email for registeration</span>
            <x-text-input id="email" class="" type="email" name="email" required autofocus
                placeholder="abc@gmail.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />

            <x-text-input id="password" class="" type="password" name="password" required
                placeholder="****************" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />

            <!-- Remember Me -->
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" style="margin-left: 10rem"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
            <div class="flex items-center justify-end mt-4">
                <button>Đăng Nhập</button>
            </div>
        </form>
    </div>
    <div class="form-container sign-up">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <h1>Sign up</h1>
            <div class="social-icons">
                <a href="#"><i class="fa-brands fa-google-plus-g"></i></a>
                <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
            </div>
            <span>or use your email for registeration</span>
            {{-- name --}}
            <x-text-input id="name" type="text" name="name" required autofocus placeholder="Ngọc Trịnh" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
            {{-- email --}}
            <x-text-input id="email" type="email" name="email" required placeholder="abc@gmail.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
            {{-- password --}}

            <x-text-input id="password" class="input-password" type="password" name="password" required placeholder="****************" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />


            {{-- confirm_password --}}
            <x-text-input id="password_confirmation" type="password" name="password_confirmation" required
                placeholder="****************" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            <div class="flex items-center justify-end mt-4">
                <button>Đăng Ký</button>
            </div>
        </form>
    </div>
    <div class="toggle-container">
        <div class="toggle">
            <div class="toggle-panel toggle-left">
                <h1>Chào mừng trở lại!</h1>
                <p>Nếu bạn đã có tài khoản hãy đăng nhập để mua sắm ngay</p>
                <button class="hidden" id="login">Đăng nhập ngay</button>
            </div>
            <div class="toggle-panel toggle-right">
                <h1>Chào bạn!</h1>
                <p>Nếu bạn vẫn chưa có tài khoản hãy đăng ký để mua sắm ngay!!</p>
                <button class="hidden" id="register">Đăng ký ngay</button>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('frontend/js/customlogin.js') }}"></script>
