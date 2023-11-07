<div class="space-y-6">
    <div class="flex justify-between flex-col lg:flex-row lg:items-center gap-6">
        <div class="flex flex-col">
            <h3 class="font-bold text-2xl">Kas kelas {{ $kelas_name }}</h3>
            <span>{{ $sekolah_name }}</span>
        </div>

        <div class="flex gap-3">
            @can('sekolah.pilih')
                <select wire:model.live="sekolah_id" class="select select-bordered @error('sekolah_id') select-error @enderror">
                    @foreach ($sekolah as $sklid => $sklname)
                        <option value="{{ $sklid }}">{{ $sklname }}</option>
                    @endforeach
                </select>
            @endcan
            @can('kelas.pilih')
                <select wire:model.live="kelas_id" class="select select-bordered @error('kelas_id') select-error @enderror">
                    @foreach ($kelases as $kelasid => $kelasname)
                        <option value="{{ $kelasid }}">{{ $kelasname }}</option>
                    @endforeach
                </select>
            @endcan
            <input type="month" class="input input-bordered" wire:model.live="bulan">
        </div>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
        @livewire('widget.saldo', ['kelas' => $kelas])
        @livewire('widget.jumlah-siswa', ['kelas' => $kelas])
        
        @if (auth()->user()->sekolah)
            @livewire('sekolah.item', ['sekolah' => auth()->user()->sekolah])
        @endif
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        @livewire('widget.belum-bayar', ['bulan' => $bulan, 'kelas_id' => $kelas->id])
        @livewire('widget.sudah-bayar', ['bulan' => $bulan, 'kelas_id' => $kelas->id])
    </div>

    @livewire('widget.last-transaksi', ['kelas_id' => $kelas->id])
    @livewire('partial.cekuser')
</div>