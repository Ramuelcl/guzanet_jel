@extends('layouts.plantilla1')

@section('content')
  <div class="row">
    <div class="col-lg-12 margin-tb">
      <div class="pull-left">
        <h2>Edit User</h2>
      </div>
      <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
      </div>
    </div>
  </div>

  <form action="{{ route('users.update', $user->id) }}" method="POST">
    @csrf
    @method('put')
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>Name:</strong>
          <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}">
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>Email:</strong>
          <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}">
        </div>
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
@endsection
