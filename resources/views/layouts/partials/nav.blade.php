<div class="container mx-auto flex justify-between px-4 py-6">
  <div class="flex items-left">
    <ul class="flex items-center">
      <li class="ml-16">
        {{-- LOGO --}}
        <a href="{{ route('home') }}">
          <img src="images/guzanet.png" alt="Guzanet" width="70" height="70" />
        </a>
      </li>
      <li class="ml-6"><a href="{{ route('cursos.index') }}"
          class="{{ request()->routeIs('cursos.*') ? 'active' : '' }} hover:text-gray-300">Cursos</a></li>
    </ul>
  </div>
  <div class="flex items-right">
    <ul class="flex items-center">
      @include('recursos.search')
      <li class="ml-6"><a href="{{ route('nosotros') }}"
          class="{{ request()->routeIs('nosotros') ? 'active' : '' }} hover:text-gray-300">Acerca
          de...</a></li>
      <li class="ml-6"><a href="{{ route('contactanos') }}"
          class="{{ request()->routeIs('contactanos') ? 'active' : '' }} hover:text-gray-300">Contáctanos</a></li>
      <li class="ml-6"><a href="{{ route('users.index') }}"
          class="{{ request()->routeIs('users.*') ? 'active' : '' }} hover:text-gray-300">Usuarios</a></li>
    </ul>
    <hr>
  </div>
</div>
