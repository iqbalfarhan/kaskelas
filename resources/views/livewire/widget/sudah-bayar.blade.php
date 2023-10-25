<div class="card bg-base-100 shadow">
    <div class="card-body">
        <h3 class="card-title">
            Sudah bayar kas bulan {{ $bulan }} kelas {{ $kelas_id }}
        </h3>

        <ul>
            @foreach ($datas as $data)
                <li>{{ $data }}</li>
            @endforeach
        </ul>
    </div>
</div>
