@extends('layouts.auth')

@section('content')
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
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
                                    <!--Begin::Register-->
                                    @livewire('auth.registerbusiness')
                                    <!--End::Register-->
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="{{ route('login') }}">
                                            {{ __('Already have an Account!') }}</a>
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
