<div class="space-y-6">
    <div class="flex justify-between items-center">
        @livewire('partial.header', [
            'title' => 'Data kelas',
            'desc' => 'tambah, edit'
        ])

        <div class="">
            <label for="createModal" class="btn">
                <x-tabler-plus class="w-5 h-5" />
                <span class="hidden lg:block">create kelas</span>
            </label>
        </div>
    </div>

    <div class="flex gap-2">
        <input type="text" class="input" wire:model.live="cari" placeholder="Cari kelas">
        @can('sekolah.pilih')
            <select wire:model.live="sekolah_id" class="select">
                <option value="">---</option>
                @foreach ($sekolah as $sklid => $sklname)
                    <option value="{{ $sklid }}">{{ $sklname }}</option>
                @endforeach
            </select>
        @endcan
    </div>

    <div class="grid lg:grid-cols-3 gap-6">
        @foreach ($datas as $data)
            @livewire('kelas.item', ['kelas' => $data], key($data->id))
        @endforeach
    </div>

    @livewire('kelas.create')
</div>