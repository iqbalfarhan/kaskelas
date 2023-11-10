<div>
    <div class="overflow-x-auto bg-base-100 shadow rounded-lg">
        <table class="table whitespace-nowrap">
            <thead class="border-b-4 border-base-200">
                <th>Tanggal</th>
                <th>siswa / kelas</th>
                <th>Nominal</th>
                <th>keterangan</th>
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr>
                        <td>{{ $data->created_at->format('d/M/Y H:i') }}</td>
                        <td>
                            <div class="flex space-x-1">
                                <span>{{ $data->user->name ?? "" }}</span>
                                <span class="opacity-75">{{ $data->kelas->name ?? "" }}</span>
                            </div>
                        </td>
                        <td>
                            <div class="flex justify-between text-{{ $data->tipe == "masuk" ? "success" : "error" }}">
                                <span>Rp.</span>
                                <span>{{ $data->tipe == "masuk" ? '+' : '-' }}{{ KasKelas::money($data->nominal) }}</span>
                            </div>
                        </td>
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
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @livewire('transaksi.show')
</div>
