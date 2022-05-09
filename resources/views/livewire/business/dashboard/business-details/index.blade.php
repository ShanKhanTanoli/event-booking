<div class="container-fluid">
    <div class="row mb-4">
        @include('errors.alerts')

        <!--Begin::Display Business Link-->
        <div class="col-12">
            <div class="alert alert-info text-white">
                <i class="fas fa-info-circle"></i> Clients will register while using this link.
                <strong class="text-white">
                    {{ route('ClientRegister', ['user_name' => Auth::user()->user_name, 'lang' => App::getLocale()]) }}
                </strong>
            </div>
        </div>
        <!--End::Display Business Link-->

        <!--Begin::Business Details-->
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">
                            Business Details
                        </h6>
                    </div>
                </div>
                <div class="card-body p-4">
                    <ul class="list-group">
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                            <strong class="text-dark">Full Name:</strong> &nbsp;
                            {!! Auth::user()->name !!}
                        </li>
                        <li class="list-group-item border-0 ps-0 text-sm">
                            <strong class="text-dark">User Name:</strong>
                            &nbsp;
                            {!! Auth::user()->user_name !!}
                        </li>
                        <li class="list-group-item border-0 ps-0 text-sm">
                            <strong class="text-dark">Mobile:</strong>
                            &nbsp; {!! Auth::user()->number !!}
                        </li>
                        <li class="list-group-item border-0 ps-0 text-sm">
                            <strong class="text-dark">Email:</strong>
                            &nbsp; {!! Auth::user()->email !!}
                        </li>
                        <li class="list-group-item border-0 ps-0 text-sm">
                            <strong class="text-dark">Address:</strong>
                            <p class="text-sm mt-2">
                                {!! Auth::user()->address !!}
                            </p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--End::Business Details-->
    </div>
</div>
