<div class="flex justify-center pt-10 opacity-70">
    <p class="text-sm text-center">
        Masuk sebagai {{ $user->name }}<br>
        ({{ $user->getRoleNames()->first() }} @if ($user->kelas) kelas {{ $user->kelas->name }}@endif)
    </p>

    <span class="badge-success"></span>
</div>
