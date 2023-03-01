
@extends('layouts.app')
@section('content')
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    {{-- message --}}
                                    {!! Toastr::message() !!}
                                    <h4 class="text-center mb-4">Masukkan akunmu</h4>
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label><strong>Email</strong></label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Masukkan email">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Password</strong></label>
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Masukkan Password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                            <div class="form-group">
                                            <div class="custom-control custom-checkbox ml-1">
                                                    <input type="checkbox" class="custom-control-input" id="basic_checkbox_1">
                                                    <label class="custom-control-label" for="basic_checkbox_1">Ingat preferensi ku</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <a href="{{ route('forget-password') }}">Lupa password?</a>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Belum mempunyai akun? <a class="text-primary" href="{{ route('register') }}">Masuk</a></p>
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