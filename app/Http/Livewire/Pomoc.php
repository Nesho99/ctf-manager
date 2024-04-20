<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Pomoc extends Component
{
    public $zadatak;
    public $pomocOtvorena = false;
    public $odgovor = "";
    public $loading = false;
    public function klikniPomoc()
    {
        $this->loading = true;
        $this->pomocOtvorena = !$this->pomocOtvorena;

        if ($this->pomocOtvorena) {
            $this->odgovor = $this->zadatak->pomoc;
        }
        $this->loading = false;
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
