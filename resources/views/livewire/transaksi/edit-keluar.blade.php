<div class="space-y-6">
    <div class="flex justify-between items-center">
        @livewire('partial.header', [
            'title' => 'Input pengeluaran',
            'desc' => 'penggunaan uang kas kelas'
        ])
    </div>
    <div class="card bg-base-100 shadow">
        <form class="card-body" wire:submit.prevent="simpan">
            <div class="grid lg:grid-cols-3 gap-4">
                @can('kelas.pilih')
                    <div class="form-control w-full">
                        <label for="" class="label">
                            <span class="label-text">Pilih kelas</span>
                        </label>
                        <select wire:model="kelas_id" class="select select-bordered @error('kelas_id') select-error @enderror">
                            <option value="">---</option>
                            @foreach ($kelases as $kelasid => $kelasname)
                                <option value="{{ $kelasid }}">{{ $kelasname }}</option>
                            @endforeach
                        </select>
                    </div>
                @endcan
                <div class="form-control w-full">
                    <label for="" class="label">
                        <span class="label-text">Bulan</span>
                    </label>
                    <input type="month" wire:model="bulan" class="input input-bordered @error('bulan') input-error @enderror">
                </div>
                <div class="form-control w-full">
                    <label for="" class="label">
                        <span class="label-text">Jenis pengeluaran</span>
                    </label>
                    <select wire:model="kategori" class="select select-bordered @error('kategori') select-error @enderror">
                        <option value="">---</option>
                        @foreach (config('kaskelas.kategori.keluar') as $kat)
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
                <div class="form-control w-full">
                    <label for="" class="label">
                        <span class="label-text">Eviden</span>
                    </label>
                    <input type="file" wire:model.live="photo" accept="image/*" class="file-input w-full file-input-bordered @error('photo') file-input-error @enderror" placeholder="0" />
                    <label for="" class="label">
                        <span class="label-text-alt">Foto kwitansi / bon</span>
                    </label>

                    @if ($photo)
                        <div class="avatar">
                            <div class="w-full rounded-lg">
                                <img src="{{ $photo->temporaryUrl() }}" />
                            </div>
                        </div>
                    @else
                        <div class="avatar">
                            <div class="w-full rounded-lg">
                                <img src="{{ $transaksi->image_url }}" />
                            </div>
                        </div>
                    @endif
                </div>
                <div class="form-control w-full lg:col-span-3">
                    <label for="" class="label">
                        <span class="label-text">Keterangan</span>
                    </label>
                    <textarea
                        type="text"
                        wire:model="keterangan"
                        class="textarea textarea-bordered @error('keterangan') textarea-error @enderror"
                        placeholder="keterangan pengeluaran. apabila pengeluaran pembelian alat, tuliskan juga jumlahnya"></textarea>
                </div>
            </div>
        </form>
    </div>

    <div class="card-body">
        <ul class="list list-disc list-outside text-sm">
            <li class="list-item">Apabila pengeluaran pembelian alat, tuliskan juga jumlahnya pada keterangan pengeluaran</li>
            <li class="list-item">Lampirkan juga photo kwitansi atau bon pengeluaran pada eviden</li>
        </ul>
    </div>

    <div>
        <button class="btn btn-primary" wire:click.prevent="simpan">Simpan</button>
    </div>
</div>