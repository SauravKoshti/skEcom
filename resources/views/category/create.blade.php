@extends('layouts.layout')
@section('content')
    <style>
        .container {
            max-width: 450px;
        }

        .push-top {
            margin-top: 50px;
        }
    </style>
    <div class="card push-top">
        <div class="card-header">
            Add Category
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <form method="post" action="{{ route('category.store') }}">
                <div class="mb-3">
                    @csrf
                    <label for="name" class="form-label">Category Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="parent_id" class="form-label">Parent Category</label>
                    <select name="parent_id" id="parent_id">
                        <option value="">Select Parent</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-block btn-danger">Create User</button>
            </form>
        </div>
    </div>
@endsection
