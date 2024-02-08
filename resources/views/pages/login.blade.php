@extends('layouts.login')


@section('title','login user')


@section('content')

    <div class="bg-[#3F0B43] flex items-center justify-center h-screen" data-aos="fade-up" data-aos-duration="2000">
        <div class="bg-white p-4 rounded-lg shadow-lg max-w-sm w-full">
            
            <h2 class="text-2xl font-semibold text-center mb-4">Masuk ke admin</h2>
            <p class="text-gray-600 text-center mb-6">untuk masuk ke halaman admin.</p>
            @if (session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form action="/login" method="POST" class="contact-form" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-semibold mb-2">Email Address <span class="text-red-600">*</span></label>
                    <input type="email" id="email" class="form-input w-full px-4 py-2 border rounded-lg text-gray-700 focus:ring-blue-500" required placeholder="admin@gmail.com">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="password" class="block text-gray-700 text-sm font-semibold mb-2">Password <span class="text-red-600">*</span></label>
                    <input type="password" id="password" class="form-input w-full px-4 py-2 border rounded-lg text-gray-700 focus:ring-blue-500" required placeholder="••••••••">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 font-bold">Login</button>
                <p class="text-gray-600 text-xs text-center mt-4">
                    Anda ingin kembali ke halaman utama ?
                    <a href="{{ route('home') }}" class="text-blue-500 hover:underline">Klik Disini</a>.
                </p>
            </form>
        </div>
    </div>

@endsection