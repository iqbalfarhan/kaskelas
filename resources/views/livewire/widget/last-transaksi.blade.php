<div>
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
                            <div class="flex justify-between">
                                <span>Rp.</span>
                                <span>{{ $data->tipe == "masuk" ? '+' : '-' }}{{ KasKelas::money($data->nominal) }}</span>
                            </div>
                        </td>
                        <td>{{ Str::limit($data->keterangan, 40) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
