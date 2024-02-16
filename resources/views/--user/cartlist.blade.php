@extends('user.master')
@section('content')
    <div class="custom-product">
        <div>
            <a href="">Filter</a>
        </div>
        <div class="col-sm-4">
            <div class="trending-wrapper">
                <h4>Result Of Products</h4>
                <div class="row searched-item cartlist-divider">
                    <a href="ordernow" class="btn btn-warning">Order Now</a>
                    @foreach ($products as $item)
                        <div class="col-sm-4">
                            <a href="detail/{{ $item->id }}">
                                <img class="treanding-image" src="{{ $item->image }}">
                            </a>
                        </div>
                        <div class="col-sm-4">
                            <a href="detail/{{ $item->id }}">
                                <div>
                                    <h2>{{ $item->name }}</h2>
                                    <h5>{{ $item->description }}</h5>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-4">
                            <a href="detail/{{ $item->id }}">
                                <div>
                                    <a href="/removecart/{{ $item->cart_id }}" class="btn btn-warning">Remove From Cart</a>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
