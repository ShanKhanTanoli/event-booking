<div class="container-fluid">
    @include('errors.alerts')
    <div class="row">
        @if ($business = Auth::user()->parent_business_id)
            <!--Begin::Business Plans-->
            @forelse ($plans as $plan)
                <div class="col-lg-4 mb-lg-0 mt-4">
                    <div class="card shadow-lg">
                        <span class="badge rounded-pill bg-light text-dark w-30 mx-auto mt-4">
                            {{ $plan->name }}
                        </span>
                        <div class="card-header text-center pt-4 pb-3">
                            <h1 class="font-weight-bold mt-2">
                                <small class="text-lg align-top me-1">
                                    {{ strtoupper(Admin::Currency()) }}
                                </small>{{ $plan->amount }}<small class="text-lg">/
                                    {{ $plan->interval_count }} {{ Str::ucfirst($plan->interval) }}</small>
                            </h1>
                        </div>
                        <div class="card-body text-lg-start text-center pt-0">
                            @if(Auth::user()->subscribed($plan->plan_id))
                            <button type="button" style="width: 100%;"
                                    class="btn btn-lg bg-gradient-success btn-block mt-3 mb-0 disabled">
                                    <i class="fas fa-check"></i>
                                    {{ trans('client.subscribed') }}
                                </button>
                            @else
                            @if(Auth::user()->subscriptions()->active()->count() > 0)
                            <button type="button" style="width: 100%;"
                                    class="btn btn-lg bg-gradient-info btn-block mt-3 mb-0 disabled">
                                    {{ trans('client.subscribe') }}
                                </button>
                            @else
                            <form wire:submit.prevent="Subscribe('{{ $plan->slug }}')">
                                <button type="submit" style="width: 100%;" wire:attrib='disabled'
                                    class="btn btn-lg bg-gradient-primary btn-block mt-3 mb-0">
                                    {{ trans('client.subscribe') }}
                                    <span wire:loading wire:target="Subscribe('{{ $plan->slug }}')"
                                        class="spinner-border spinner-border-sm" role="status" aria-hidden="true">
                                    </span>
                                </button>
                            </form>
                            @endif
                            @endif
                        </div>
                    </div>
                </div>
                @empty
                <!--Begin::If Plans not found-->
                <div class="col-lg-12 mb-lg-0 mt-4">
                    <div class="alert alert-danger text-white">
                        <strong>
                            {{ trans('client.business-plan-not-found') }}
                        </strong>
                    </div>
                </div>
                <!--End::If Plans not found-->
            @endforelse
            <!--End::Business Plans-->
        @else
            <div class="col-lg-12 mb-lg-0 mt-4">
                <div class="alert alert-danger text-white">
                    <strong>
                        {{ trans('client.business-plan-not-found') }}
                    </strong>
                </div>
            </div>
        @endif
    </div>
</div>
