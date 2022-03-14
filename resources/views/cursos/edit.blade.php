@extends('layouts.plantilla1')
@section('title', 'Guzanet')

@section('content')
  <h1>editar curso</h1>

  <div>
    <form action="{{ route('cursos.update', $curso) }}" method="post">
      @csrf
      @method('PUT')

      @include('cursos.create_edit')
    </form>
  </div>
@endsection
