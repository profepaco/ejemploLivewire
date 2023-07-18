<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Datos de la película') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg md:flex">
                <img src="{{asset('storage/peliculas/'.$pelicula->imagen)}}" class="md:w-80">
                <div class="p-6 text-gray-900">
                    <p class="bg-gray-300 p-2 rounded-md">Título:</p>
                    <h3 class="font-light text-3xl p-2">{{ $pelicula->titulo }}</h3>
                    <div class="mt-4">
                        <p class="bg-gray-300 p-2 rounded-md">Descripción:</p>
                        <p class="font-light text-lg p-2">{{$pelicula->descripcion}}</p>
                    </div>
                    <div class="mt-4">
                        <p class="bg-gray-300 p-2 rounded-md">Genero:</p>
                        <p class="font-light text-lg p-2">{{$pelicula->genero}}</p>
                    </div>
                    <div class="mt-4">
                        <p class="bg-gray-300 p-2 rounded-md">Calificación:</p>
                        <p class="font-light text-lg p-2">{{$pelicula->calificacion}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
