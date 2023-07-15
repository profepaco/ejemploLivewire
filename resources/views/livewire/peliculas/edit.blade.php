<div class="md:w-1/2">
    <form wire:submit.prevent='editarPelicula'>
        <div class="mt-4">
            <x-input-label for="titulo" :value="__('Titulo')" />
            <x-text-input 
                id="titulo" 
                class="block mt-1 w-full" 
                type="text" 
                wire:model="titulo" 
                :value="old('titulo')" 
            />
            <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="descripcion" :value="__('Descripcion')" />
            <x-text-area id="descripcion" class="block mt-1 w-full" wire:model="descripcion"/>
            <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="genero" :value="__('Genero')" />
            <x-text-input 
                id="genero" 
                class="block mt-1 w-full" 
                type="text" wire:model="genero" 
                :value="old('genero')" 
            />
            <x-input-error :messages="$errors->get('genero')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="calificacion" :value="__('Calificación')" />
            <x-text-input 
                id="calificacion" 
                class="block mt-1 w-full" 
                type="number" wire:model="calificacion" 
                :value="old('calificacion')" 
            />
            <x-input-error :messages="$errors->get('calificacion')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="imagen" :value="__('Imagen')" />
            <x-text-input 
                id="imagen" 
                class="block mt-1 w-full" 
                type="file" wire:model="nueva_imagen"
                accept="image/*"
            />
            <x-input-error :messages="$errors->get('imagen')" class="mt-2" />
        </div>
        @if($imagen)
            <div class="mt-4 w-48">
                Imagen actual:
                <img src="{{ asset('storage/peliculas/'.$imagen) }}">
            </div>
        @endif
        @if($nueva_imagen)
            <div class="mt-4 w-48">
                Imagen nueva:
                <img src="{{ $nueva_imagen->temporaryUrl() }}">
            </div>
        @endif
        <div class="mt-4">
            <x-primary-button>Guardar cambios</x-primary-button>
        </div>
    </form>
</div>
