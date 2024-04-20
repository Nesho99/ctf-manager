<?php

namespace App\Http\Livewire;
use App\Models\PristupPomoci;
use Auth;
use Carbon\Carbon;
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
            $userId = Auth::id();
            $natjecanjeId = $this->zadatak->natjecanje->id;
        
            $zadnjiPristup = PristupPomoci::where('user_id', $userId)
                                        ->where('natjecanje_id', $natjecanjeId)
                                        ->latest('vrijeme_pristupio')
                                        ->first();
            if ($zadnjiPristup) {
                $trenutnoVrijeme = Carbon::now("Europe/Zagreb");
                $vrijeme_zadnjeg_pristupa = Carbon::parse($zadnjiPristup->vrijeme_pristupio,"Europe/Zagreb");
        
                $razlika = ($trenutnoVrijeme->diffInMinutes($vrijeme_zadnjeg_pristupa));
        
        
                if ($razlika >= 15) {
                    $this->odgovor = $this->zadatak->pomoc;
                    $pomoc= new PristupPomoci();
                    $pomoc->user_id=  auth()->user()->id;
                    $pomoc->natjecanje_id= $this->zadatak->natjecanje->id;
                    $pomoc->save();

                } else {
                    $this->odgovor ="Pomoć će biti dostupna u ". $vrijeme_zadnjeg_pristupa->addMinutes(15)->toDateTimeLocalString();
                    
                }
            } else {
                $this->odgovor = $this->zadatak->pomoc;
                $pomoc= new PristupPomoci();
                $pomoc->user_id=  auth()->user()->id;
                $pomoc->natjecanje_id= $this->zadatak->natjecanje->id;
                $pomoc->save();
                
            }
           

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
