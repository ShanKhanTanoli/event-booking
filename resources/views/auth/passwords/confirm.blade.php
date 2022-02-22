@extends('layouts.auth')

@section('content')
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">
                                            <a href="{{ url('/') }}">
                                                Home
                                            </a>
                                        </h1>
                                    </div>
                                    <form method="POST" action="{{ route('password.confirm') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input id="password" type="password"
                                                class="form-control form-control-user @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="current-password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            {{ __('Confirm Password') }}
                                        </button>
                                    </form>
                                    @if(!Auth::user())
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="{{ route('login') }}">
                                            {{ __('Want to Login?') }}</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="{{ route('register') }}">
                                            {{ __('Want to Register?') }}</a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
