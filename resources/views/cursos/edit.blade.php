<x-app-layout>

  <div class="mx-auto py-12">
    <h1>editar curso</h1>

    <form action="{{ route('cursos.update', $curso) }}" method="post">
      @csrf
      @method('PUT')

      @include('cursos.create_edit')
    </form>

</x-app-layout>
