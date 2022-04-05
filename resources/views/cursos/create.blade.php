<x-app-layout>

  <div class="mx-auto py-12">
    <h1>crear curso</h1>
    <form action="{{ route('cursos.store') }}" method="POST">
      @csrf
      {{-- @method('') --}}

      @include('cursos.create_edit')
    </form>
  </div>

</x-app-layout>
