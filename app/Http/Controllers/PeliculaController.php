<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use Illuminate\Http\Request;

class PeliculaController extends Controller
{

    public function __construct()
    {
        //$this->middleware(['role:super-admin']);
        //$this->middleware('role:cliente',['only'=>['index','show']]);
        $this->middleware('permission:view peliculas', ['only' => ['index','show']]);
        $this->middleware('permission:create peliculas|edit peliculas',['only'=>['create','store','edit','update']]);
        
        
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('peliculas.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('peliculas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelicula $pelicula)
    {
        return view('peliculas.show',['pelicula'=>$pelicula]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelicula $pelicula)
    {
        return view('peliculas.edit',['pelicula'=>$pelicula]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pelicula $pelicula)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelicula $pelicula)
    {
        //
    }
}
