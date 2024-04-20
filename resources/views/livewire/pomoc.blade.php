<div class="accordion" id="accordionPomoc{{$zadatak->id}}">
    <div class="accordion-item">
        <h2 class="accordion-header" id="heading-{{$zadatak->id}}">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapse-{{$zadatak->id}}" aria-expanded="false"
                    aria-controls="collapse-{{$zadatak->id}}" wire:click="klikniPomoc">
                Pomoć
            </button>
        </h2>
        <div id="collapse-{{$zadatak->id}}" class="accordion-collapse collapse"
             aria-labelledby="heading-{{$zadatak->id}}"
             data-bs-parent="#accordionPomoc{{$zadatak->id}}">
            <div class="accordion-body">
                @if ($pomocOtvorena)
                    {{$odgovor}}
                @endif
               
            </div>
        </div>
    </div>
</div>
