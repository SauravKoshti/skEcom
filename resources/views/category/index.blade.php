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
                    <td class="text-center">Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $cate)
                    <tr>
                        <td>{{ $cate->id }}</td>
                        <td>{{ $cate->name }}</td>
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
            </tbody>
        </table>
        <div>
        @endsection
