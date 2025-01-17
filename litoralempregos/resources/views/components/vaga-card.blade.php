<div class="border border-gray-300 rounded-lg p-4">
    <h3 class="text-lg font-bold">{{ $vaga->title }}</h3>
    <p class="text-gray-600">{{ $vaga->company->name }}</p>
    <p class="text-sm text-gray-500">{{ $vaga->location }}</p>
    <a href="{{ route('vagas.show', $vaga->id) }}" class="text-blue-500 hover:underline mt-2 inline-block">
        Ver mais detalhes
    </a>
</div>
