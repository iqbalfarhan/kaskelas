<div class="space-y-6">
    <div class="flex justify-between items-center">
        @livewire('partial.header', [
            'title' => 'Riwayat transaksi',
            'desc' => 'Riwayat pemasukan dan pengeluaran'
        ])

        <div>
            <button class="btn btn-success">
                <x-tabler-edit class="w-5 h-5" />
                <span>Edit</span>
            </button>
        </div>
    </div>

    <div>
        @livewire('user.item', ['user' => $user])
    </div>

    <div class="overflow-x-auto bg-base-100 shadow rounded-lg">
        <table class="table">
            <thead class="border-b-4">
                <th>No</th>
                <th>Tanggal</th>
                <th>kelas</th>
                <th>siswa</th>
                <th>Nominal</th>
                <th>keterangan</th>
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr>
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->created_at->format('d F Y') }}</td>
                        <td>{{ $data->kelas->name }}</td>
                        <td>{{ $data->user->name }}</td>
                        <td>
                            <div class="flex justify-between font-mono font-semibold">
                                <span>Rp.</span>
                                <span>{{ $data->tipe == "masuk" ? '+' : '-' }}{{ $data->nominal }}</span>
                            </div>
                        </td>
                        <td>{{ Str::limit($data->keterangan, 50) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
