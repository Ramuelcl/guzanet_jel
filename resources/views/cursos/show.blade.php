<x-app-layout>

  <div class="mx-auto py-12">
    <h1>Listado de Cursos</h1>
    [{{ $curso->id }}]<h1>curso: {{ $curso->name }} </h1></br>
    <a href="{{ route('cursos.index') }}">Volver </a><br><a href="{{ route('cursos.edit', $curso) }}">
      Editar</a></br>
    <strong>Categoria: {{ $curso->category }}</strong>
    <p>{{ $curso->description }}</p>
    <form action="{{ route('cursos.destroy', $curso) }}" method="post">
      @csrf
      @method('delete')
      <button type="submit">Eliminar</button>
    </form>
  </div>

</x-app-layout>
