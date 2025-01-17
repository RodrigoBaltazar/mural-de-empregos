<?php

namespace App\View\Components;

use Illuminate\View\Component;

class VagaCard extends Component
{
    public $vaga;

    /**
     * Cria uma nova instância do componente.
     *
     * @param mixed $vaga
     */
    public function __construct($vaga)
    {
        $this->$vaga = $vaga;
    }

    /**
     * Obtém a view ou conteúdo que representa o componente.
     */
    public function render()
    {
        return view('components.vaga-card');
    }
}
