<div class="card bg-base-100 shadow w-full max-w-md mx-auto">
    <form class="card-body lg:p-14" wire:submit.prevent="register">
        <img src="{{ url('YouFi.png') }}" alt="" class="w-48 mx-auto my-10">
        <div class="space-y-6 py-4">
            <div class="space-y-2">
                <input type="text" class="input input-bordered w-full @error('name') input-error @enderror" wire:model="name" placeholder="Nama lengkap" />
                <input type="text" class="input input-bordered w-full @error('username') input-error @enderror" wire:model="username" placeholder="Username" />
                <input type="password" class="input input-bordered w-full @error('password') input-error @enderror" wire:model="password" placeholder="Password" />
                <select class="select select-bordered w-full @error('sekolah_id') select-error @enderror" wire:model.live="sekolah_id">
                    <option value="">Pilih sekolah</option>
                    @foreach ($sekolahs as $sklid => $sklname)
                        <option value="{{ $sklid }}">{{ $sklname }}</option>
                    @endforeach
                </select>
                <select class="select select-bordered w-full @error('kelas_id') select-error @enderror" wire:model.live="kelas_id">
                    <option value="">Pilih kelas</option>
                    @foreach ($kelas as $klsid => $klsname)
                        <option value="{{ $klsid }}">{{ $klsname }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="card-actions">
            <button class="btn btn-primary btn-block">
                <span wire:loading>
                    <span class="loading loading-sm"></span>
                </span>
                <span>Daftar</span>
            </button>
        </div>
        <div class="text-center py-4">
            <a href="{{ route('login') }}" class="text-xs">Sudah punya akun?</a>
        </div>
    </form>
</div>
