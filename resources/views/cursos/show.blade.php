@extends('layouts.plantilla1')
@section('title', 'Guzanet')

@section('content')
  [{{ $curso->id }}]<h1>curso: {{ $curso->name }} </h1></br>
  <a href="{{ route('cursos.index') }}">Volver </a><a href="{{ route('cursos.edit', $curso->id) }}"> Editar</a></br>
  <strong>Categoria: {{ $curso->category }}</strong>
  <p>{{ $curso->description }}</p>
@endsection
