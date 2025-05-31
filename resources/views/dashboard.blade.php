@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header bg-primary text-white text-center">
                    <h4>{{ __('Dashboard') }}</h4>
                </div>
                <div class="card-body text-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h5 class="text-success">{{ __('You are logged in!') }}</h5>
                    <p class="text-muted">Welcome to your dashboard. Manage your content efficiently.</p>
                    <a href="{{ route('home') }}" class="btn btn-outline-primary mt-3">Go to Home</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection