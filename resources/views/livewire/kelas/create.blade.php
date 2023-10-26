<div>
    <input type="checkbox" id="createModal" class="modal-toggle" wire:model="show" />
    <div class="modal">
        <form class="modal-box" wire:submit="simpan">
            <h3 class="font-bold text-lg">Tambah kelas baru</h3>
            <div class="py-4">
                <div class="form-control">
                    <label for="" class="label">
                        <span class="label-text">Nama kelas</span>
                    </label>
                    <input type="text" class="input input-bordered @error('name') input-error @enderror" wire:model="name" />
                </div>
                <div class="form-control">
                    <label for="" class="label">
                        <span class="label-text">Angkatan</span>
                    </label>
                    <input type="text" class="input input-bordered @error('angkatan') input-error @enderror" wire:model="angkatan" />
                </div>
                <div class="form-control">
                    <label for="" class="label">
                        <span class="label-text">Wali kelas</span>
                    </label>
                    <input type="text" class="input input-bordered @error('walikelas') input-error @enderror" wire:model="walikelas" />
                </div>
                <div class="form-control">
                    <label for="" class="label">
                        <span class="label-text">ID Group Telegram</span>
                    </label>
                    <input type="text" class="input input-bordered @error('telegram_group_id') input-error @enderror" wire:model="telegram_group_id" />
                </div>
            </div>
            <div class="modal-action justify-between">
                <label for="createModal" class="btn">Close!</label>
                <button class="btn btn-primary">simpan</button>
            </div>
        </form>
    </div>
</div>



