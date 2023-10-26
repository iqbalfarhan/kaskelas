<div class="space-y-6">
    <div class="flex justify-between">
        @livewire('partial.header', [
            'title' => 'Data siswa',
            'desc' => 'Menambahkan mengedit dan menghapus siswa'
        ])

        <div>
            <label class="btn btn-ghost" for="modalCreate">
                <x-tabler-plus class="w-5 h-5" />
                <span class="hidden lg:block">Create</span>
            </label>
        </div>
    </div>

    <div class="flex justify-between">
        <div class="flex gap-2">
            <input type="search" class="input" placeholder="Cari siswa" wire:model.live="cari" />
            <select class="select" wire:model.live="kelas_id">
                <option value="">---</option>
                @foreach ($kelases as $kelasid => $kelasname)
                    <option value="{{ $kelasid }}">{{ $kelasname }}</option>
                @endforeach
            </select>
        </div>
        <div wire:loading>
            <span class="loading"></span>
        </div>
    </div>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($datas as $data)
            @livewire('user.item', ['user' => $data, 'withActions' => false], key($data->id))
        @endforeach
    </div>

    @livewire('user.create')
</div>
