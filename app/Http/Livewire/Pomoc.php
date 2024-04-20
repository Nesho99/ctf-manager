<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Pomoc extends Component
{
    public $zadatak;
    public $pomocOtvorena = false;
    public $odgovor = "";
    public function klikniPomoc()
    {
        $this->pomocOtvorena = !$this->pomocOtvorena;
        if ($this->pomocOtvorena) {
            $this->odgovor = $this->zadatak->pomoc;
        }
    }
    public function mount($zadatak)
    {
        $this->zadatak = $zadatak;
    }
    public function render()
    {
        return view('livewire.pomoc');
    }
}
