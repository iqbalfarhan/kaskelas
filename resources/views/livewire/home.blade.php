<div class="space-y-6">
    <div class="flex justify-between items-center">
        @livewire('partial.header', [
            'title' => "Kas kelas ".$kelas->name
        ])

        <div class="flex gap-3">
            <select wire:model.live="kelas_id" class="select select-bordered @error('kelas_id') select-error @enderror">
                <option value="">---</option>
                @foreach ($kelases as $kelasid => $kelasname)
                    <option value="{{ $kelasid }}">{{ $kelasname }}</option>
                @endforeach
            </select>
            <input type="month" class="input input-bordered" wire:model.live="bulan">
        </div>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
        <div class="stats shadow w-full">
            <div class="stat">
                <div class="stat-title">Saldo kelas</div>
                <div class="stat-value">
                    <div class="flex gap-2">
                        <small>Rp.</small>
                        <span>{{ KasKelas::money($kelas->saldo) }}</span>
                    </div>
                </div>
                <div class="stat-desc">Dalam kas kelas</div>
            </div>
        </div>
        <div class="stats shadow w-full">
            <div class="stat">
                <div class="stat-title">Jumlah siswa</div>
                <div class="stat-value">{{ $kelas->users->count() }}</div>
                <div class="stat-desc">Dalam antrian</div>
            </div>
        </div>
    </div>

    @livewire('widget.last-transaksi', ['kelas_id' => $kelas->id])
</div>