@extends('layouts.layout')
@section('content')
    <style>
        .push-top {
            margin-top: 50px;
        }
    </style>
     <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                {{-- <h2>Laravel 8 CRUD with Image Upload Example from scratch - ItSolutionStuff.com</h2> --}}
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('product.create') }}"> Create New Product</a>
            </div>
        </div>
    </div>
    <div class="push-top">
        @if (session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br />
        @endif
        <table class="table">
            <thead>
                <tr class="table-warning">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Images</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1; ?>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->category }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->stock }}</td>
                        <td><img src="/image/{{ $product->images }}" width="100px"></td>
                        <td>
                            <form action="{{ route('product.destroy', $product->id) }}" method="POST">

                                <a class="btn btn-info" href="{{ route('product.show', $product->id) }}">Show</a>

                                <a class="btn btn-primary" href="{{ route('product.edit', $product->id) }}">Edit</a>

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    <div>
@endsection
