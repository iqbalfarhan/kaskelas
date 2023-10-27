<div class="space-y-6">
    <div class="flex justify-between items-center">
        @livewire('partial.header', [
            'title' => 'Input pemasukan',
            'desc' => 'tambah kas kelas '.$kelases[$kelas_id]
        ])
    </div>
    <div class="card bg-base-100 shadow">
        <form class="card-body" wire:submit.prevent="simpan">
            @can('kelas.pilih')
                <div class="grid lg:grid-cols-3 gap-4">
                    <div class="form-control w-full">
                        <label for="" class="label">
                            <span class="label-text">Pilih kelas</span>
                        </label>
                        <select wire:model.live="kelas_id" class="select select-bordered @error('kelas_id') select-error @enderror">
                            <option value="">---</option>
                            @foreach ($kelases as $kelasid => $kelasname)
                                <option value="{{ $kelasid }}">{{ $kelasname }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            @endcan
            <div class="grid lg:grid-cols-2 gap-4">
                <div class="form-control w-full">
                    <label for="" class="label">
                        <span class="label-text">Pilih siswa</span>
                    </label>
                    <select wire:model="user_id" class="select select-bordered @error('user_id') select-error @enderror">
                        <option value="">---</option>
                        @foreach ($users as $userid => $username)
                            <option value="{{ $userid }}">{{ $username }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-control w-full">
                    <label for="" class="label">
                        <span class="label-text">Jenis pemasukan</span>
                    </label>
                    <select wire:model="kategori" class="select select-bordered @error('kategori') select-error @enderror">
                        <option value="">---</option>
                        @foreach (config('kaskelas.kategori.masuk') as $kat)
                            <option value="{{ $kat }}">{{ $kat }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-control w-full">
                    <label for="" class="label">
                        <span class="label-text">Nominal</span>
                        @if ($nominal)
                        <span class="label-text-alt">Rp. {{ KasKelas::money($nominal) }}</span>
                        @endif
                    </label>
                    <div class="join w-full bordered">
                        <span class="join-item btn shadow">Rp</span>
                        <input type="number" step="1" wire:model.live="nominal" class="input join-item w-full input-bordered @error('nominal') input-error @enderror" placeholder="0" />
                    </div>
                </div>
                <div class="form-control">
                    <label for="" class="label">
                        <span class="label-text">Pembayaran kas bulan</span>
                    </label>
                    <input type="month" wire:model.live="bulan" class="input input-bordered @error('bulan') input-error @enderror" />
                </div>
                <div class="form-control w-full lg:col-span-2">
                    <label for="" class="label">
                        <span class="label-text">Keterangan</span>
                    </label>
                    <textarea type="text" wire:model="keterangan" class="textarea textarea-bordered @error('keterangan') textarea-error @enderror" placeholder="keterangan input"></textarea>
                </div>
            </div>
        </form>
    </div>

    <div>
        <button class="btn btn-primary" wire:click.prevent="simpan">Simpan</button>
    </div>
</div>