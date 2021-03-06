@extends('guru.layout')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header bg-primary text-white">Dashboard</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            You are logged in!
        </div>
    </div>
</div>
@endsection
