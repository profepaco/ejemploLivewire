<div>
    @forelse($peliculas as $pelicula)
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-2 border-b-2">
        <div class="text-gray-900 md:flex md:justify-between md:items-center">
            <div>
                <img class="md:w-60 lg:w-72" src="{{asset('storage/peliculas/'.$pelicula->imagen)}}"alt="{{$pelicula->nombre}}">
            </div>
            <div class="space-y-3 p-4">
                <a href="#" class="text-xl font-bold">
                    {{$pelicula->titulo}}
                </a>
                <p class="md:max-w-screen-sm text-sm text-gray-600 font-semibold">{{$pelicula->descripcion}}</p>
                <p class="text-sm text-gray-500 font-bold">Calificacion: <span class="font-semibold">{{$pelicula->calificacion}}</span></p>
            </div>
            <div class="p-4 flex flex-col md:flex-row items-strech gap-3 mt-2 md:mt-0">
                <a href="{{route('peliculas.edit',['pelicula'=>$pelicula])}}" class="bg-slate-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                    Editar
                </a>
                <button wire:click="$emit('mostrarAlerta','{{$pelicula->id}}')" class="bg-red-500 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                    Eliminar
                </button>
            </div>
        </div> 
    </div>
    @empty
        <p>No hay peliculas registradas</p>
    @endforelse
    <div class="flex justify-center mt-10">
        {{ $peliculas->links() }} 
    </div>
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        Livewire.on('mostrarAlerta', peliculaId => {
            Swal.fire({
            title: '¿Deseas eliminar la película?',
            text: "Una vez eliminada la película no se puede recuperar",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Eliminar',
            cancelButtonText: 'Cancelar'
            }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emit('eliminarPelicula',peliculaId);
                Swal.fire(
                'Se elimino la Película',
                'Eliminada correctamente',
                'success'
                );
            }
        });
        });
           
        
        
    </script>
@endpush


