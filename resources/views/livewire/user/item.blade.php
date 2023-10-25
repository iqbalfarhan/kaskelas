<div class="card card-compact shadow bg-base-100">
    <div class="card-body flex flex-col lg:flex-row gap-4 justify-between lg:items-center">
        <a href="{{ route('user.show', $user->id) }}" class="flex flex-row gap-4" wire:navigate>
            <div class="avatar placeholder">
                <div class="w-16 aspect-square rounded-full bg-neutral-focus text-neutral-content">
                    <span class="text-lg">{{ $user->initial }}</span>
                </div>
            </div>
            <div class="flex-1 flex flex-col">
                <div class="text-lg font-semibold">{{ $user->name }}</div>
                <span class="text-sm opacity-75">Kelas : {{ $user->kelas->name ?? "tidak ada" }}</span>
                <span class="text-sm opacity-75">NIS  : {{ $user->nis }}</span>
            </div>
        </a>

        @if ($withActions)
            <button class="badge badge-sm btn-ghost">
                {{ implode(', ', $user->getRoleNames()->toArray()) }}
            </button>
            <div class="flex gap-1 items-center">
                <label for="editModal" class="btn btn-sm btn-success btn-square">
                    <x-tabler-edit class="w-4 h-4" />
                </label>
                <button class="btn btn-sm btn-error btn-square">
                    <x-tabler-trash class="w-4 h-4" />
                </button>
                <button class="btn btn-sm btn-neutral btn-square">
                    <x-tabler-key class="w-4 h-4" />
                </button>

                @livewire('user.edit', ['user' => $user])
            </div>
        @endif
    </div>
</div>