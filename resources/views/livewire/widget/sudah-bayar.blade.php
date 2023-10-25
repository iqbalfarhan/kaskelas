<div class="card bg-base-100 shadow">
    <div class="card-body">
        <h3 class="card-title">
            Sudah bayar kas rutin bulan {{ date('F Y', strtotime($bulan)) }}
        </h3>

        <ul class="columns-2 text-success">
            @foreach ($datas as $data)
                <li>{{ $data }}</li>
            @endforeach
        </ul>
    </div>
</div>
