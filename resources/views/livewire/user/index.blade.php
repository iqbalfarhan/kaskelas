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
        <div class="hidden lg:flex gap-2">
            <input type="search" class="input" placeholder="Cari siswa" wire:model.live="cari" />
            @can('sekolah.pilih')
                <select class="select" wire:model.live="sekolah_id">
                    <option value="">Pilih sekolah</option>
                    @foreach ($sekolah as $sklid => $sklname)
                        <option value="{{ $sklid }}">{{ $sklname }}</option>
                    @endforeach
                </select>
            @endcan
            @can('kelas.pilih')
                <select class="select" wire:model.live="kelas_id">
                    <option value="">Pilih kelas</option>
                    @foreach ($kelases as $kelasid => $kelasname)
                        <option value="{{ $kelasid }}">{{ $kelasname }}</option>
                    @endforeach
                </select>
            @endcan
        </div>
        <div class="block lg:hidden">
            <button class="btn btn-primary">
                <x-tabler-filter class="w-5 h-5" />
                <span>Filter data</span>
            </button>
        </div>
        <div wire:loading>
            <span class="loading"></span>
        </div>
    </div>

    <div>
        {{ $datas->links() }}
    </div>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($datas as $data)
            <a href="{{ route('user.show', $data->id) }}" wire:navigate wire:key="{{ $data->id }}">
                @livewire('user.item', ['user' => $data, 'withActions' => false], key($data->id))
            </a>
        @endforeach
    </div>

    @livewire('user.create')
</div>
