<div class="stats shadow w-full">
    <div class="stat">
        <div class="stat-title">Saldo kas kelas</div>
        <div class="stat-value">
            <div class="flex gap-2">
                <small>Rp.</small>
                <span>{{ KasKelas::money($kelas->saldo) }}</span>
            </div>
        </div>
        <div class="stat-desc">Per bulan {{ date('F Y') }}</div>
    </div>
</div>