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
                <a class="btn btn-success" href="{{ route('category.create') }}"> Create New category</a>
            </div>
        </div>

        <form action="" method="GET">
            <input type="text" name="category" required/>
            <button type="submit">Submit</button>
        </form>

        {{-- <form action="{{ route('import/category') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="file" class="form-control">
            <br>
            <button class="btn btn-success">Import Category Data</button>
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
                    <td>ID</td>
                    <td>Name</td>
                    <td>Parent Category</td>
                    <td>Status</td>
                    <td class="text-center">Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $cate)
                    <tr>
                        <td>{{ $cate->id }}</td>
                        <td>{{ $cate->name }}</td>
                        <td>
                            @foreach ($categories as $catsse)
                                @if ($cate->parent_id == $catsse->id)
                                    {{ $catsse->name }}
                                @endif
                            @endforeach
                            </td>
                        <td>
                            @if ($cate->status == 1)
                                {{ "Active" }}
                                @else
                                {{ "DeActive" }}
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="{{ route('category.edit', $cate->id) }}" class="btn btn-primary btn-sm"">Edit</a>
                            <form action="{{ route('category.destroy', $cate->id) }}" method="post"
                                style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                {{-- {{ $categories->links('pagination::bootstrap-4') }} --}}


            </tbody>
        </table>
        <div>
        @endsection
