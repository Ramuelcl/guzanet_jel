@extends('layouts.plantilla1')
@section('title', 'Guzanet')

@section('content')
  <h1>crear curso</h1>
  <div>
    <form action="{{ route('cursos.store') }}" method="POST">
      @csrf
      {{-- @method('') --}}

      @include('cursos.create_edit')
    </form>
  </div>
@endsection
