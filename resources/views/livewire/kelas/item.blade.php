<div class="card bg-base-100 shadow">
    <div class="card-body items-center">
        <div class="avatar placeholder">
            <div class="w-24 rounded-full bg-neutral text-neutral-content text-xl">
                {{ $kelas->name }}
            </div>
        </div>
        <h3 class="card-title">Kelas {{ $kelas->name }}</h3>
        <span>{{ $kelas->users()->count() }} siswa</span>
    </div>
</div>