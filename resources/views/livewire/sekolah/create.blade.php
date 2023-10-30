<div>
    <input type="checkbox" id="createModal" class="modal-toggle" wire:model.live="show" />
    <div class="modal">
        <form class="modal-box" wire:submit.prevent="simpan">
            <h3 class="font-bold text-lg">Tambah data sekolah</h3>
            <div class="py-4 space-y-4">
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Nama sekolah</span>
                        @error('name')
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        @enderror
                    </label>
                    <input type="text" placeholder="Type here" class="input @error('name') input-error @enderror input-bordered" wire:model="name" />
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Alamat</span>
                        @error('address')
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        @enderror
                    </label>
                    <input type="text" placeholder="Type here" class="input @error('address') input-error @enderror input-bordered" wire:model="address" />
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Logo sekolah</span>
                        @error('logo')
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        @enderror
                    </label>
                    <input type="file" placeholder="Type here" class="file-input @error('logo') file-input-error @enderror file-input-bordered" wire:model="logo" />
                </div>
            </div>
            <div class="modal-action justify-between">
                <label for="createModal" class="btn">Close!</label>
                <button class="btn btn-primary">simpan</button>
            </div>
        </form>
    </div>
</div>
