@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col">
                        <div class="p-5">
                            <div class="text-center">
                                @if (!Business::CanCreateClient($find_business->id))
                                    <div class="alert alert-danger">
                                        <strong>
                                            You can not create an account.Contact {{ ucfirst($find_business->name) }}
                                            for more information.
                                        </strong>
                                    </div>
                                @endif
                                <h1 class="h4 text-gray-900 mb-4">
                                    Business Details
                                </h1>
                            </div>
                            <!--Begin::Business Details-->
                            @include('auth.partials.business-details')
                            <!--End::Business Details-->
                        </div>
                    </div>
                    @if (Business::CanCreateClient($find_business->id))
                        <div class="col">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <!--Begin::Register-->
                                        @livewire('auth.registerclient',['business' => $find_business])
                                        <!--End::Register-->
                                        <hr>
                                        <div class="text-center">
                                            <a class="small" href="{{ route('login') }}">
                                                {{ __('Already have an Account!') }}</a>
                                        </div>
                                        <div class="text-center">
                                            <a class="small" href="{{ route('RegisterAsBusiness') }}">
                                                {{ __('Register As Business Owner') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
