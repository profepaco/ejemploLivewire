<?php

namespace App\Http\Livewire\Peliculas;

use App\Models\Pelicula;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{

    use WithFileUploads;

    public $titulo;
    public $descripcion;
    public $genero;
    public $calificacion;
    public $imagen;

    protected $rules = [
        'titulo' => 'required',
        'descripcion' => 'required',
        'genero' => 'required',
        'calificacion' => 'required',
        'imagen' => 'required|image|max:1024'
    ];

    public function render()
    {
        return view('livewire.peliculas.create');
    }

    public function guardarPelicula(){
        $data = $this->validate();

        //almacenando la imagen
        $imagen = $this->imagen->store('public/peliculas');

        $data['imagen'] = str_replace('public/peliculas/','',$imagen);

        //Creando la pelicula
        Pelicula::create([
            'titulo' => $data['titulo'],
            'descripcion' => $data['descripcion'],
            'genero' => $data['genero'],
            'calificacion' => $data['calificacion'],
            'imagen' => $data['imagen']
        ]);

        //redireccionando
        session()->flash('message','Película agregada correctamente');

        return redirect()->route('peliculas.index');
    }
}
