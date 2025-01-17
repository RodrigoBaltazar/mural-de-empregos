<!-- resources/views/jobs/create.blade.php -->

@if(auth()->user()->role !== 'admin')
    <p>Acesso negado.</p>
@endif
<form action="{{ route('vagas.store') }}" method="POST">
    @csrf
    <label for="title">Título</label>
    <input type="text" id="title" name="title" required>

    <label for="description">Descrição</label>
    <textarea id="description" name="description" required></textarea>

    <label for="company">Empresa</label>
    <input type="text" id="company" name="company" required>

    <label for="location">Localização</label>
    <input type="text" id="location" name="location" required>

    <button type="submit">Adicionar Vaga</button>
</form>
