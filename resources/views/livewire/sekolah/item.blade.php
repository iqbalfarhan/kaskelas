<div class="stats shadow w-full">
    <div class="stat">
        <div class="stat-figure text-secondary">
            <div class="avatar">
                <div class="w-16 rounded">
                <img src="{{ $sekolah->logo_url }}" />
                </div>
            </div>
        </div>
        <div class="stat-title">{{ $sekolah->name }}</div>
        <div class="stat-value">
            &nbsp;
        </div>
        <div class="stat-desc">{{ Str::limit($sekolah->address, 20) }}</div>
    </div>
</div>