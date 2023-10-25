<div class="flex justify-center pt-10 opacity-70">
    <p class="text-sm">
        Masuk sebagai {{ $user->name }}
        ({{ $user->getRoleNames()->first() }} @if ($user->kelas) kelas {{ $user->kelas->name }}@endif)
    </p>

    <span class="badge-success"></span>
</div>
