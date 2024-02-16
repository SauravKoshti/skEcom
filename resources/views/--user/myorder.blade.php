@extends('master')
@section('content')
    <div class="custom-product">
        <div>
            <a href="">Filter</a>
        </div>
        <div class="col-sm-4">
            <div class="trending-wrapper">
                <h4>My Orders</h4>
                <div class="row searched-item cartlist-divider">
                    @foreach ($orderData as $item)
                        <div class="col-sm-4">
                            <a href="detail/{{ $item->id }}">
                                <img class="treanding-image" src="{{ $item->product_images }}">
                            </a>
                        </div>
                        <div class="col-sm-4">
                            <a href="detail/{{ $item->id }}"></a>
                            <div>
                                <h2>Name : {{ $item->product_name }}</h2>
                                <h5>Description : {{ $item->product_description }}</h5>
                                <h5>Address : {{ $item->address }}</h5>
                                <h5>Delivery Status : {{ $item->status }}</h5>
                                <h5>Payment Method : {{ $item->payment_method }}</h5>
                                <h5>Payment Status : {{ $item->payment_status }}</h5>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
