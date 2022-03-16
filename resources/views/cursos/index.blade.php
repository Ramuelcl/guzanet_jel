@extends('layouts.plantilla1')
@section('title', 'Guzanet')

@section('content')
  <h1>listar cursos</h1>
  <a href="{{ route('cursos.create') }}">crear curso</a>
  @if (count($cursos) > 0)

    @foreach ($cursos as $curso)
      <div class="well">
        [{{ $curso->id }}]<h3><a href="{{ route('cursos.show', $curso) }}">{{ $curso->name }}</a></h3>
        <a href="#">-{{ $curso->category }}-</a>

        <small>Written on {{ $curso->created_at }} </small></br>
      </div>
    @endforeach
    {{ $cursos->links() }}
  @else
    <p> no post found </p>
  @endif

@endsection
