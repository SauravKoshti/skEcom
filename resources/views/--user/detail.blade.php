@extends('user.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}">
            </div>
            <div class="col-sm-6">
                <a href="/">Go Back</a>
                <h2>{{ $product['name'] }}</h2>
                <h3>Price : ₹ {{ $product['price'] }}</h3>
                <h4>Deatil :{{ $product['description'] }}</h4>
                <h4>Category : {{ $product['category'] }}</h4>
                <br><br>
                <form action="/add_to_cart" method="post">
                    @csrf
                    <input type="hidden" name="product_id" value={{ $product['id'] }}>
                    <input type="number" name="qty" id="qty" min="1" value="1">
                    <button class="btn btn-primary">Add to Cart</button>
                </form>
                <br><br>
                <button class="btn btn-success">Buy Now</button>
            </div>
        </div>
    </div>
    </div>
@endsection
