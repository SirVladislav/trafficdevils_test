@extends('layouts.app')

@section('title', 'Admin Page')

@section('navbar')
    @include('layouts.navbar')
@endsection

@section('content')
    <div class="container mt-4">
        <h1>Admin Dashboard</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @foreach($leadData as $data)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Lead: {{ $data['lead']->name }}</h5>
                    <p class="card-text">Total Orders Count: {{ $data['total_orders_count'] }}</p>
                    <h6 class="card-subtitle mb-2 text-muted">Buyers:</h6>
                    <ul class="list-group">
                        @foreach($data['lead']->buyers as $buyer)
                            <li class="list-group-item">
                                Buyer: {{ $buyer->name }}
                                <ul>
                                    @foreach($buyer->orders as $order)
                                        <li>- {{ $order->orderInfo }}</li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endforeach
    </div>
@endsection
