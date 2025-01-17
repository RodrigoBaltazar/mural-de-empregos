@extends('layouts.app')

@section('title', 'Vagas de Emprego')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Vagas Disponíveis</h2>

    <!-- Formulário de Filtro -->
    <form method="GET" action="{{ route('vagas.index') }}" class="mb-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <!-- Filtro por Palavra-chave -->
            <input type="text" name="keyword" value="{{ request('keyword') }}"
                   class="border border-gray-300 rounded px-4 py-2"
                   placeholder="Buscar por palavra-chave...">

            <!-- Filtro por Categoria -->
            <select name="category" class="border border-gray-300 rounded px-4 py-2">
                <option value="">Todas as Categorias</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ request('category') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            <!-- Botão de Filtrar -->
            <button type="submit" class="bg-blue-500 text-white rounded px-4 py-2">
                Filtrar
            </button>
        </div>
    </form>

    <!-- Listagem de Vagas -->
    @if ($vagas->isEmpty())
        <p class="text-gray-600">Nenhuma vaga disponível com os filtros aplicados.</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($vagas as $vaga)
                <x-vaga-card :vaga="$vaga" />
            @endforeach
        </div>

        <div class="mt-6">
            {{ $vagas->links() }}
        </div>
    @endif
@endsection
