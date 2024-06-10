@extends('layouts.app')

@section('title', 'Buyer Page')

@section('navbar')
    @include('layouts.navbar')
@endsection


@section('content')
    <div class="container mt-4">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <h1>Your Orders</h1>
                <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#addOrderModal">
                    Add Order
                </button>

                <!-- List of Orders -->
                @foreach($orders as $order)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Order #{{ $order->id }}</h5>
                            <p class="card-text">{{ $order->orderInfo }}</p>
                            <form action="/order/{{ $order->id }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editOrderModal{{ $order->id }}">
                                Edit
                            </button>
                        </div>
                    </div>

                    <!-- Edit Order Modal -->
                    <div class="modal fade" id="editOrderModal{{ $order->id }}" tabindex="-1" role="dialog" aria-labelledby="editOrderModalLabel{{ $order->id }}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editOrderModalLabel{{ $order->id }}">Edit Order</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="/order/{{ $order->id }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="orderInfo">Order Info</label>
                                            <input type="text" class="form-control" id="orderInfo" name="orderInfo" value="{{ $order->orderInfo }}" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <!-- Add Order Modal -->
                <div class="modal fade" id="addOrderModal" tabindex="-1" role="dialog" aria-labelledby="addOrderModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addOrderModalLabel">Add Order</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="/order" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="orderInfo">Order Info</label>
                                        <input type="text" class="form-control" id="orderInfo" name="orderInfo" required>
                                    </div>
                                    <button type="submit" class="btn btn-success">Add Order</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
