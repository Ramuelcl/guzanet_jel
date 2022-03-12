@extends('layouts.plantilla1')
@section('title', 'Guzanet')

@section('content')
  @if (isset($categoria))
    <h1>mostrar curso {{ $curso }} de categoria {{ $categoria }}</h1>
  @else
    <h1>mostrar curso {{ $curso }}</h1>
  @endif
@endsection
