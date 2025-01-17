<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vaga;
use App\Models\Category;

class VagaController extends Controller
{
    public function index(Request $request)
    {
        $query = Vaga::query();

        // Filtro por palavra-chave
        if ($request->filled('keyword')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->keyword . '%')
                    ->orWhere('description', 'like', '%' . $request->keyword . '%');
            });
        }

        // Filtro por categoria
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        // Filtro por empresa
        if ($request->filled('company')) {
            $query->whereHas('company', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->company . '%');
            });
        }

        // Paginação
        $vagas = $query->with('company', 'category')->paginate(10);

        // Carregar categorias para o filtro
        $categories = Category::all();

        return view('vagas.index', compact('vagas', 'categories'));
    }

    public function show(Vaga $vaga)
    {
        return view('vagas.show', compact('vaga'));
    }

    public function create()
    {
        return view('vagas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'location' => 'required',
            'company' => 'required',
            'is_closed' => 'required',

        ]);

        Vaga::create($validated);

        return redirect()->route('vagas.create')->with('success', 'Vaga criada com sucesso!');
    }
}
