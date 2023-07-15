<?php

namespace App\Http\Livewire\Peliculas;

use App\Models\Pelicula;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $pelicula_id;
    public $titulo;
    public $descripcion;
    public $genero;
    public $calificacion;
    public $imagen;
    public $nueva_imagen;

    protected $rules = [
        'titulo' => 'required',
        'descripcion' => 'required',
        'genero' => 'required',
        'calificacion' => 'required',
        'nueva_imagen' => 'nullable|image|max:1024'
    ];

    public function mount(Pelicula $pelicula){
        $this->pelicula_id = $pelicula->id;
        $this->titulo = $pelicula->titulo;
        $this->descripcion = $pelicula->descripcion;
        $this->genero = $pelicula->genero;
        $this->calificacion = $pelicula->calificacion;
        $this->imagen = $pelicula->imagen;
    }

    public function render()
    {
        return view('livewire.peliculas.edit');
    }

    public function editarPelicula(){
        
        //validando la información
        $data = $this->validate();

        //actualizando la información
        if($this->nueva_imagen){
            $imagen = $this->nueva_imagen->store('public/peliculas');
            $data['imagen'] = str_replace('public/peliculas/','',$imagen);
        }

        //buscando la pelicula
        $pelicula = Pelicula::find($this->pelicula_id);
       
        //actualizando la pelicula
        $pelicula->titulo = $data['titulo'];
        $pelicula->descripcion = $data['descripcion'];
        $pelicula->genero = $data['genero'];
        $pelicula->calificacion = $data['calificacion'];
        $pelicula->imagen = $data['imagen'] ?? $pelicula->imagen;

        $pelicula->save();
        
        session()->flash('message','La película se actualizó correctamente');

        return redirect()->route('peliculas.index');
    }
}
