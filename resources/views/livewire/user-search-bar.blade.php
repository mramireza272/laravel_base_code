<div class="relative">
    <input type="text" placeholder="Buscar por nombre, apellido paterno, apellido materno, correo electrónico" class="form-control" wire:model="query">

	@if(!empty($query))
        <div class="fixed top-0 right-0 bottom-0 left-0" wire:click="reset"></div>

        <div class="absolute z-10 list-group bg-white w-full rounded-t-none shadow-lg">
            @if(!empty($users))
                @foreach($users as $i => $user)
                    <a href="{{ route('usuarios.edit', $user['id']) }}"
                        class="list-item {{ $highlightIndex === $i ? 'highlight' : '' }}"
                    >{{ $user['name'] }}</a>
                @endforeach
            @else
                <div class="list-item">No results!</div>
            @endif
        </div>
    @endif
</div>

