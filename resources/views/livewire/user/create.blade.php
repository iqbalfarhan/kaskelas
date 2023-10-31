<div>
    <input type="checkbox" id="modalCreate" class="modal-toggle" wire:model.live="show" />
    <div class="modal">
        <form class="modal-box max-w-4xl" wire:submit="simpan">
            <h3 class="font-bold text-lg">Tambah siswa</h3>

            <div class="flex flex-col gap-6">
                <div class="py-4 grid lg:grid-cols-3 gap-6">
                    <div class="form-control">
                        <label for="" class="label">
                            <span class="label-text">Nama sekolah</span>
                            @error('sekolah_id')
                            <span class="label-text-alt text-error">{{ $message }}</span>
                            @enderror
                        </label>
                        <select class="select select-bordered @error('sekolah_id') select-error @enderror" wire:model.live="sekolah_id">
                            <option value="">---</option>
                            @foreach ($sekolah as $sklid => $sklname)
                                <option value="{{ $sklid }}">{{ $sklname }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-control">
                        <label for="" class="label">
                            <span class="label-text">Kelas</span>
                            @error('kelas_id')
                            <span class="label-text-alt text-error">{{ $message }}</span>
                            @enderror
                        </label>
                        <select class="select select-bordered @error('kelas_id') select-error @enderror" wire:model="kelas_id">
                            <option value="">---</option>
                            @foreach ($kelases as $kelasid => $kelasname)
                                <option value="{{ $kelasid }}">{{ $kelasname }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="py-4 grid lg:grid-cols-3 gap-6">
                    <div class="form-control">
                        <label for="" class="label">
                            <span class="label-text">Nama lengkap</span>
                            @error('name')
                            <span class="label-text-alt text-error">{{ $message }}</span>
                            @enderror
                        </label>
                        <input type="text" class="input input-bordered @error('name') input-error @enderror" wire:model="name" placeholder="name" />
                    </div>
                    <div class="form-control">
                        <label for="" class="label">
                            <span class="label-text">NIS</span>
                            @error('nis')
                            <span class="label-text-alt text-error">{{ $message }}</span>
                            @enderror
                        </label>
                        <input type="text" class="input input-bordered @error('nis') input-error @enderror" wire:model="nis" placeholder="nis" />
                    </div>
                </div>
                <div class="py-4 grid lg:grid-cols-3 gap-6">
                    <div class="form-control">
                        <label for="" class="label">
                            <span class="label-text">Login sebagai</span>
                            @error('role')
                            <span class="label-text-alt text-error">{{ $message }}</span>
                            @enderror
                        </label>
                        <select class="select select-bordered @error('role') select-error @enderror" wire:model="role">
                            <option value="">---</option>
                            @foreach ($roles as $rl)
                                <option value="{{ $rl }}">{{ $rl }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-control">
                        <label for="" class="label">
                            <span class="label-text">Username login</span>
                            @error('username')
                            <span class="label-text-alt text-error">{{ $message }}</span>
                            @enderror
                        </label>
                        <input type="text" class="input input-bordered @error('username') input-error @enderror" wire:model="username" placeholder="username" />
                    </div>
                    <div class="form-control">
                        <label for="" class="label">
                            <span class="label-text">Password login</span>
                            @error('password')
                            <span class="label-text-alt text-error">{{ $message }}</span>
                            @enderror
                        </label>
                        <input type="text" class="input input-bordered @error('password') input-error @enderror" wire:model="password" placeholder="password" />
                    </div>
                </div>
            </div>
            <div class="modal-action justify-between">
                <label for="modalCreate" class="btn">Close!</label>
                <button class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
