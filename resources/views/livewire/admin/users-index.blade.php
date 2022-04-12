<x-slot name="header">
  <h2 class="font-semibold text-xl text-gray-800 leading-tight">
    Categories
  </h2>
</x-slot>
<div class="flex-initial w-64 card">
  <div class="card-header">
    <x-jet-label </div>

      <div class="flex-initial w-64 card-body">
        <table class="min-w-full bg-white border">
          <thead class="bg-gray-800 text-white">
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Email</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody class="text-gray-700">
            @php
              $count = 1;
            @endphp
            @foreach ($data as $user)
              @php
                $count++;
                $grid = $count % 2 == 0 ? 'bg-gray-600' : 'bg-gray-100';
              @endphp
              <tr class="{{ $grid }}">
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td w-10>
                  {{-- <a class="btn btn-info" href="{{ route('users.show', $user) }}">Show</a> --}}
                  <a class="
          btn btn-primary" href="{{ route('users.edit', $user) }}">Edit</a>
                  {{-- <form action="{{ route('users.destroy', $user) }}" method="POST">
                  @csrf
                  @method('delete')
                  <button type="submit" class="btn btn-danger">Delete</button>
                </form> --}}
                </td>
              </tr>
            @endforeach

          </tbody>
        </table>
        <div class="card-footer">
          {{ $data->links() }}
        </div>
      </div>
  </div>
