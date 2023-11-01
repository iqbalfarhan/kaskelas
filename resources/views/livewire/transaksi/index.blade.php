<div class="space-y-6">
    <div class="flex justify-between items-center">
        @livewire('partial.header', [
            'title' => 'Riwayat transaksi',
            'desc' => 'Riwayat pemasukan dan pengeluaran'
        ])
    </div>

    <div class="flex gap-2">
        <input type="month" class="input input-bordered" wire:model.live='bulan'>
        @can('sekolah.pilih')
            <select wire:model.live="sekolah_id" class="select">
                <option value="">---</option>
                @foreach ($sekolah as $sklid => $sklname)
                    <option value="{{ $sklid }}">{{ $sklname }}</option>
                @endforeach
            </select>
        @endcan
        @can('kelas.pilih')
            <select wire:model.live="kelas_id" class="select select-bordered @error('kelas_id') select-error @enderror">
                <option value="">---</option>
                @foreach ($kelases as $kelasid => $kelasname)
                    <option value="{{ $kelasid }}">{{ $kelasname }}</option>
                @endforeach
            </select>
            {{ $kelas_id }}
        @endcan
    </div>

    <div class="overflow-x-auto bg-base-100 shadow rounded-lg">
        <table class="table whitespace-nowrap">
            <thead class="border-b-4 border-base-200">
                <th>Tanggal</th>
                <th>Jam</th>
                <th>kelas</th>
                <th>siswa</th>
                <th>Nominal</th>
                <th>kategori</th>
                <th>keterangan</th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr>
                        <td>{{ $data->created_at->format('d F Y') }}</td>
                        <td>{{ $data->created_at->format('H:i') }}</td>
                        <td>{{ $data->kelas->name }}</td>
                        <td>{{ $data->user->name ?? "" }}</td>
                        <td class="{{ $data->tipe == "masuk" ? 'text-success' : 'text-error' }}">
                            <div class="flex justify-between">
                                <span>Rp.</span>
                                <span>{{ $data->tipe == "masuk" ? '+' : '-' }}{{ KasKelas::money($data->nominal) }}</span>
                            </div>
                        </td>
                        <td>{{ $data->kategori }}</td>
                        <td>
                            <div class="flex gap-2">
                                @if ($data->photo)
                                    <button class="avatar" wire:click="$dispatch('showTransaksi', [{{ $data->id }}])">
                                        <div class="w-6 rounded-lg">
                                            <img src="{{ $data->image_url }}" />
                                        </div>
                                    </button>
                                @endif
                                <span>{{ Str::limit($data->keterangan, 40) }}</span>
                            </div>
                        </td>
                        <td>
                            <div class="flex flex-row space-x-1">
                                @can('transaksi.edit')
                                    <a href="{{ route('transaksi.edit', $data->id) }}" class="btn btn-xs btn-success btn-square">
                                        <x-tabler-edit class="w-4 h-4" />
                                    </a>
                                @endcan
                                @can('transaksi.delete')
                                    <button class="btn btn-xs btn-error btn-square" wire:click="deleteTransaksi({{ $data->id }})" wire:confirm="Anda yakin akan menghapus riwayat ini">
                                        <x-tabler-trash class="w-4 h-4" />
                                    </button>
                                @endcan

                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @livewire('transaksi.show')
</div>
