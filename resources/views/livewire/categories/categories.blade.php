{{-- Categorias:
1-controlador-namespace App\Http\Livewire\Categories;
2-views.livewire.categories.categories.blade.php --}}
@php
$fields = [
    [
        'name' => 'id',
        'title' => 'ID',
        'type' => 'text',
        'order' => true,
        'icon' => 'chevron-down',
    ],
    [
        'name' => 'title',
        'title' => 'Title',
        'type' => 'text',
        'order' => true,
        'icon' => 'chevron-down',
    ],
    [
        'name' => 'color',
        'title' => 'Color',
        'type' => 'text',
        'order' => true,
        'icon' => 'chevron-down',
    ],
    [
        'name' => 'color-2',
        'title' => 'Hexa',
        'type' => 'text',
        'order' => false,
        'icon' => 'chevron-down',
    ],
    [
        'name' => 'numero',
        'title' => 'Número',
        'type' => 'number',
        'order' => false,
        'icon' => 'chevron-down',
    ],
    [
        'name' => 'fecha',
        'title' => 'Fecha',
        'type' => 'date',
        'order' => false,
        'icon' => 'chevron-down',
    ],
    [
        'name' => 'status',
        'title' => 'Estado',
        'type' => 'bool',
        'order' => true,
        'icon' => 'chevron-down',
    ],
];
// dd($categories);
@endphp
<div class="flex">
    @include('dashboard.sidebar')
    <div class="p-2 sm:px-20 bg-white border-b border-gray-200">
        <div class="mt-4 text-2xl">
            {{ __('Categorías') }}
        </div>
        {{ $query }}
        <div class="mt-3">
            @if (session()->has('message'))
                <div class="bg-teal-100 rounded-b text-teal-900 px-4 py-4 shadow-md my-3" role="alert">
                    <div class="flex">
                        <div>
                            <h4>{{ session('message') }}</h4>
                        </div>
                    </div>
                </div>
            @endif

            <div class="flex justify-between">
                <div>
                    <button wire:click="create()" class="bg-green-500 hover:bg-green-600 font-bold  py-2 px-4 my-3">
                        {{ __('Nuevo') }}
                    </button>
                    @if ($modal)
                        @include('livewire.categories.CreateEdit')
                    @endif
                    <input wire:model.devounce.500ms="q" type="search" name="" placeholder="Buscar"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline placeholder-blue-400">
                </div>
                <div class="mr-2">
                    <input type="checkbox" class="mr-2 leading-tight" name="" wire:model="active" />
                    {{ __('¿ Sólo activos ?') }}
                </div>
            </div>
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        @foreach ($fields as $field)
                            @if ($active && $field['name'] == 'estado')
                                {{-- quita la columna de titulo estado --}}
                            @else
                                <th class="px-4 py-2">
                                    <div class="flex items-center">
                                        @if ($field['order'])
                                            <x-jet-button class="font-bold"
                                                wire:click="sortBy('{{ $field['name'] }}')">
                                                {{ __($field['title']) }}
                                            </x-jet-button>
                                            @if ($sortBy == $field['name'])
                                                @if (!$sortAsc)
                                                    <span class="w-4 h-4 ml-2"> <svg
                                                            xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                            viewBox="0 0 20 20" fill="currentColor">
                                                            <path fill-rule="evenodd"
                                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    </span>
                                                @else
                                                    <span class="w-4 h-4 ml-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                            viewBox="0 0 20 20" fill="currentColor">
                                                            <path fill-rule="evenodd"
                                                                d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    </span>
                                                @endif
                                            @endif
                                        @else
                                            {{ __($field['title']) }}
                                        @endif
                                    </div>
                                </th>
                            @endif
                        @endforeach
                        <th class="px-4 py-2">
                            <div class="flex items-center">{{ __('Acciones') }}</div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if ($categories)
                        @foreach ($categories as $categorie)
                            <tr>
                                <td class="rounded border px-4 py-2">{{ $categorie->id }}</td>
                                <td class="rounded border px-4 py-2">{{ $categorie->title }}</td>
                                <td style="background-color:#{{ $categorie->color }};"
                                    class="rounded border px-2 py-2"></td>
                                <td class="rounded border px-4 py-2">{{ $categorie->color }}</td>
                                <td class="rounded border px-4 py-2 text-right">
                                    {{ number_format(rand(1, 1000000) / 100, 2) }}
                                </td>
                                <td class="rounded border px-4 py-2 text-right">
                                    {{ rand(1, 30) . '/' . rand(1, 12) . '/' . rand(1900, 2100) }}
                                </td>
                                {{-- @php
                                    $status = rand(0, 1);
                                    $categorie->status = $status ? 'activo' : 'inactivo';
                                    $categorie->save();
                                @endphp --}}
                                @if (!$active)
                                    {{-- quita la columna estado --}}
                                    <td class="rounded border px-4 py-2">
                                        {{ $categorie->status }}
                                    </td>
                                @endif
                                <td class="rounded border px-4 py-2 text-center">
                                    <button wire:click="edit({{ $categorie->id }})"
                                        class="bg-blue-900 hover:bg-blue-600 text-white font-bold py-2 px-4">{{ __('Editar') }}</button>
                                    <button wire:click="delete({{ $categorie->id }})"
                                        class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4">{{ __('Eliminar') }}</button>

                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            {{ __('No existen registros') }}
                        </tr>
                    @endif
                </tbody>
            </table>
            @if ($categories)
                {{ $categories->links() }}
            @endif

        </div>
    </div>
</div>
