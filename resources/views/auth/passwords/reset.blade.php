@extends('layouts.app')

@section('content')
    <div class="w-screen h-screen bg-sign-in bg-cover flex items-center justify-center">
        <div
            class="flex flex-col items-start justify-center bg-white rounded-lg w-vw-80 px-8 md:w-vw-60 h-vh-60 md:px-12 xl:w-vw-40 xl:h-vh-80 xl:px-24 py-8 shadow-xl">
            <img src="{{ asset('assets/svg/mangga-logo-with-text.svg') }}" class="w-full mb-4">
            <div class="text-xl md:text-3xl font-lb text-mangga-green-400">Hai,</div>
            <div class="text-lg md:text-xl text-mangga-orange-400 mb-8">Silahkan reset password anda</div>
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <input type="email" name="email" class="form-input mb-8" placeholder="E-Mail Anda">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <input type="password" name="password" class="form-input mb-8" placeholder="Password Baru">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <input type="password" name="password_confirmation" class="form-input mb-8" placeholder="Konfirmasi Password">
                <button type="submit" class="mangga-button-green w-full mb-4">Reset Password</button>
            </form>
        </div>
    </div>
@endsection
