@extends('layouts.app')

@section('title', 'Lead Page')

@section('navbar')
    @include('layouts.navbar')
@endsection


@section('content')
    <div class="container mt-4">
        <h1>Lead Dashboard</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @foreach($buyers as $buyer)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $buyer->name }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Orders:</h6>
                    <ul class="list-group">
                        @foreach($buyer->orders as $order)
                            <li class="list-group-item">
                                - {{ $order->orderInfo }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endforeach
    </div>
@endsection
