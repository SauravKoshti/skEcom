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
    Edit & Update
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
    <form method="post" action="{{ route('category.update', $category->id) }}">
        @csrf
        @method('PATCH')
        <div class="form-group">
            @csrf
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" value="{{ $category->name }}" />
        </div>
        <div class="mb-3">
            <label for="parent_id" class="form-label">Parent Category</label>
            <select name="parent_id" id="parent_id">
                <option value="">Select Parent</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-block btn-danger">Update Data</button>
    </form>

  </div>
</div>
@endsection
