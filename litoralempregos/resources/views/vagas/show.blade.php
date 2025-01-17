@extends('layouts.app')

@section('title', $vaga->title)

@section('content')
    <div class="bg-white shadow rounded p-6">
        <h2 class="text-2xl font-bold mb-4">{{ $vaga->title }}</h2>
        <p class="text-sm text-gray-500">Publicado por {{ $vaga->company->name }} - {{ $vaga->created_at->format('d/m/Y') }}</p>

        <div class="mt-4">
            <h3 class="text-lg font-semibold mb-2">Descrição:</h3>
            <p class="text-gray-700">{{ $vaga->description }}</p>
        </div>

        @if ($vaga->salary)
            <div class="mt-4">
                <h3 class="text-lg font-semibold mb-2">Salário:</h3>
                <p class="text-gray-700">R$ {{ number_format($vaga->salary, 2, ',', '.') }}</p>
            </div>
        @endif
    </div>

    <div class="mt-6">
        <a href="{{ route('jobs.index') }}" class="text-blue-500 hover:underline">← Voltar para a lista de vagas</a>
    </div>
@endsection
