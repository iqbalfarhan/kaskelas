<div class="card card-compact shadow bg-base-100">
    <div class="card-body flex flex-col lg:flex-row gap-4 justify-between lg:items-center">
        <div class="flex flex-row gap-4">
            <div>
                <div class="avatar placeholder {{ $user->active ? 'online' : '' }}">
                    <div class="w-16 aspect-square rounded-full bg-neutral-focus text-neutral-content">
                        <span class="text-lg">{{ $user->initial }}</span>
                    </div>
                </div>
            </div>
            <div class="flex-1 flex flex-col">
                <div class="text-lg font-semibold">
                    {{ $user->name }}
                </div>
                <span class="text-sm opacity-75">{{ $user->nis }} &bull; {{ $user->kelas->name ?? "tidak ada" }} &bull; {{$user->sekolah->name ?? ""}}</span>
                <button class="badge badge-sm btn-primary capitalize">
                    {{ implode(', ', $user->getRoleNames()->toArray()) }}
                </button>
            </div>
        </div>

        @if ($withActions)
            <div class="flex gap-1 items-center">
                @can('user.changerole')
                    <label for="editModal" class="btn btn-sm btn-success btn-square">
                        <x-tabler-edit class="w-4 h-4" />
                    </label>
                @endcan
                @can('user.delete')
                    <button class="btn btn-sm btn-error btn-square" wire:click="deleteUser" wire:confirm="Apa anda yakin akan menghapus">
                        <x-tabler-trash class="w-4 h-4" />
                    </button>
                @endcan
                @can('user.resetpassword')
                    <button class="btn btn-sm btn-neutral btn-square" wire:click="resetPasswordUser" wire:confirm="Apa anda yakin akan menreset password">
                        <x-tabler-key class="w-4 h-4" />
                    </button>
                @endcan

                @livewire('user.edit', ['user' => $user])
            </div>
        @endif
    </div>
</div>