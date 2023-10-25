<div class="card bg-base-100 shadow">
    <div class="card-body">
        <h3 class="card-title">Kelas {{ $kelas->name }}</h3>
        {{ KasKelas::money($kelas->saldo) }}
    </div>
</div>