<a href="{{ route('user.show', $user->id) }}" class="card card-compact shadow bg-base-100" wire:navigate>
    <div class="card-body flex flex-row gap-4">
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
    </div>
</a>