<x-app-layout>

  <div class="mx-auto py-12">
    <h1>Usuarios</h1>
    <div class="row">
      <div class="col-lg-12 margin-tb">
        <div class="pull-left">
          <h2>User</h2>
        </div>
        <div class="pull-right">
          <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>Name:</strong>
          <input type="text" name="name" class="form-control" value="{{ $user->name }}">
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>Email:</strong>
          <input type="email" name="email" class="form-control" value="{{ $user->email }}">
        </div>
      </div>
    </div>
  </div>

</x-app-layout>
