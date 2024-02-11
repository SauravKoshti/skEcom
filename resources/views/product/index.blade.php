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
                <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
            </div>
        </div>
        <form action="" method="GET">
            <input type="text" name="productSearch" required/>
            <button type="submit">Submit</button>
        </form>
        {{-- <form action="{{ route('import/products') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="file" class="form-control">
            <br>
            <button class="btn btn-success">Import Product Data</button>
             <a class="btn btn-warning" href="{{ route('export') }}">Export User Data</a>
        </form> --}}
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
                <?php $i=1;     ?>
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
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST">

                                <a class="btn btn-info" href="{{ route('products.show', $product->id) }}">Show</a>

                                <a class="btn btn-primary" href="{{ route('products.edit', $product->id) }}">Edit</a>

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                {{ $products->links('pagination::bootstrap-4') }}
            </tbody>
        </table>
    <div>
@endsection
