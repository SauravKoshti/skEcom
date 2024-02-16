@extends('master')
@section('content')
    <div class="custom product">
        <div class="col-sm-4">
            <a href="#">Filter</a>
        </div>
        <div class="col-sm-4">
            <div class="tranding-wrapper">
                <h3>Results Of Products</h3>
                @foreach ($products as $product)
                    <div class="tranding">
                        <a href="/detail/{{ $product['id'] }}">
                            <img class="tranding-image" src="{{ $product['product_images'] }}"
                                alt="{{ $product['product_name'] }}">
                    </div>
                    <div class="">
                        <h3>{{ $product['product_name'] }}</h3>

                    </div>
                    </a>
            </div>
            @endforeach
        </div>
    </div>
@endsection
