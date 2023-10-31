<div class="space-y-6">
    <div class="flex justify-between">
        @livewire('partial.header', [
            'title' => 'Detail kelas',
            'desc' => 'Detail kelas '. $kelas->name
        ])

        <div class="flex">
            @can('kelas.edit')
                <a href="{{ route('kelas.edit', $kelas->id) }}" class="btn btn-success">
                    <x-tabler-edit class="w-4 h-4" />
                    <span class="hidden lg:block">Edit kelas</span>
                </a>
            @endcan
        </div>
    </div>

    <div class="grid grid-cols-3 gap-4">
        @livewire('widget.saldo', ['kelas' => $kelas])
        @livewire('widget.jumlah-siswa', ['kelas' => $kelas])
        @livewire('sekolah.item', ['sekolah' => $kelas->sekolah])
    </div>

    <div class="flex justify-between">
        <div class="flex gap-2">
            <input type="search" class="input" placeholder="Cari siswa" wire:model.live="cari" />
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
