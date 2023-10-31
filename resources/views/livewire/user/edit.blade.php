<div>
    <input type="checkbox" id="editModal" class="modal-toggle" wire:model.live="show" />
    <div class="modal">
        <form class="modal-box max-w-sm" wire:submit.prevent="simpan">
            <h3 class="font-bold text-lg">Edit user</h3>
            <div class="py-4">
                <div class="form-control">
                    <label for="" class="label">
                        <span class="label-text">Sekolah</span>
                    </label>
                    <select type="text" class="select select-bordered" wire:model="sekolah_id">
                        <option value="">---</option>
                        @foreach ($sekolahs as $sekolahid => $sekolahname)
                            <option value="{{ $sekolahid }}">{{ $sekolahname }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-control">
                    <label for="" class="label">
                        <span class="label-text">Kelas</span>
                    </label>
                    <select type="text" class="select select-bordered" wire:model="kelas_id">
                        <option value="">---</option>
                        @foreach ($kelases as $kelasid => $kelasname)
                            <option value="{{ $kelasid }}">{{ $kelasname }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-control">
                    <label for="" class="label">
                        <span class="label-text">Privilege</span>
                    </label>
                    <select type="text" class="select select-bordered" wire:model="role">
                        <option value="">---</option>
                        @foreach ($roles as $name)
                            <option value="{{ $name }}">{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-action justify-between">
                <label for="editModal" class="btn">Close!</label>
                <button class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
