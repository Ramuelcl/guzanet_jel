{{-- Categorias:
1-controlador-namespace App\Http\Livewire\Categories;
2-views.livewire.categories.categories.blade.php --}}
@php
$fields = [
    [
        'name' => 'id',
        'title' => 'ID',
        'type' => 'text',
    ],
    [
        'name' => 'title',
        'title' => 'Title',
        'type' => 'text',
    ],
    [
        'name' => 'color',
        'title' => 'Color',
        'type' => 'text',
    ],
    [
        'name' => 'color-2',
        'title' => 'Hexa',
        'type' => 'text',
    ],
    [
        'name' => 'numero',
        'title' => 'Número',
        'type' => 'number',
    ],
    [
        'name' => 'fecha',
        'title' => 'Fecha',
        'type' => 'date',
    ],
    [
        'name' => 'estado',
        'title' => 'Estado',
        'type' => 'bool',
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
        <div class="mt-3">
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        @foreach ($fields as $field)
                            <th class="px-4 py-2">
                                <div class="flex items-center">{{ __($field['title']) }}</div>
                            </th>
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
                                <td class="rounded border px-4 py-2">{{ rand(0, 1) ? __('Activo') : __('Inactivo') }}
                                </td>
                                <td class="rounded border px-4 py-2">{{ __('Editar') }} - {{ __('Eliminar') }}
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
