<?php

namespace App\Http\Livewire\Peliculas;

use App\Models\Pelicula;
use Livewire\Component;

class Index extends Component
{

    protected $listeners = ['eliminarPelicula'];

    public function render()
    {
        $peliculas = Pelicula::paginate(10);
        return view('livewire.peliculas.index',['peliculas'=>$peliculas]);
    }

    public function eliminarPelicula(Pelicula $pelicula){
        $pelicula->delete();
    }
}
