<div class="space-y-6">
    <div class="flex justify-between items-center">
        @livewire('partial.header', [
            'title' => 'Riwayat transaksi',
            'desc' => 'Riwayat pemasukan dan pengeluaran'
        ])
    </div>

    <div class="flex gap-2">
        <input type="month" class="input input-bordered">
        <select wire:model.live="kelas_id" class="select select-bordered @error('kelas_id') select-error @enderror">
            <option value="">---</option>
            @foreach ($kelases as $kelasid => $kelasname)
                <option value="{{ $kelasid }}">{{ $kelasname }}</option>
            @endforeach
        </select>
    </div>

    <div class="overflow-x-auto bg-base-100 shadow rounded-lg">
        <table class="table whitespace-nowrap">
            <thead class="border-b-4 border-base-200">
                <th>Tanggal</th>
                <th>Jam</th>
                <th>kelas</th>
                <th>siswa</th>
                <th>Nominal</th>
                <th>keterangan</th>
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr>
                        <td>{{ $data->created_at->format('d F Y') }}</td>
                        <td>{{ $data->created_at->format('H:i') }}</td>
                        <td>{{ $data->kelas->name }}</td>
                        <td>{{ $data->user->name ?? "" }}</td>
                        <td>
                            <div class="flex justify-between font-mono font-semibold">
                                <span>Rp.</span>
                                <span>{{ $data->tipe == "masuk" ? '+' : '-' }}{{ $data->nominal }}</span>
                            </div>
                        </td>
                        <td>{{ Str::limit($data->keterangan, 40) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
