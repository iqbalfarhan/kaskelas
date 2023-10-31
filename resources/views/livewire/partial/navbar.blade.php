<div class="navbar bg-base-100">
    <div class="navbar-start">
        <label class="btn btn-square btn-ghost lg:hidden" for="drawer">
            <x-tabler-menu />
        </label>
    </div>
    <div class="navbar-center">
        <a href="{{ route('home') }}" class="btn btn-ghost normal-case text-xl">
            <span>{{ config('app.tagline') }}</span>
            <span>{{ $sekolah->name ?? "" }}</span>
        </a>
        {{-- <img src="{{ url('YouFi.png') }}" alt="" class="w-8 self-center"> --}}
    </div>
    <div class="navbar-end">
        <a href="{{ route('profile') }}" class="btn btn-ghost" wire:navigate>
            <div class="flex-col items-end hidden lg:flex normal-case">
                <span class="font-semibold text-sm">{{ auth()->user()->name }}</span>
                <span class="text-xs opacity-70">{{ auth()->user()->getRoleNames()->first() }}</span>
            </div>
            <div class="avatar placeholder">
                <div class="w-8 rounded-full bg-neutral-focus text-neutral-content">
                    <span>{{ auth()->user()->initial ?? "..." }}</span>
                </div>
            </div>
        </a>
    </div>
</div>