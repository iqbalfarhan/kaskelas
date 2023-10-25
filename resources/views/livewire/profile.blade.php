<div class="space-y-6">
    <div class="flex justify-between items-center">
        @livewire('partial.header', [
            'title' => 'Edit profile user',
            'desc' => 'edit informasi'
        ])
    </div>

    <div class="grid lg:grid-cols-2 gap-6">
        <div class="card bg-base-100 shadow">
            <div class="card-body">
                <div class="form-control">
                    <label for="" class="label">
                        <span class="label-text">Nama lengkap</span>
                    </label>
                    <input type="text" class="input input-bordered" wire:model="name">
                </div>
                <div class="form-control">
                    <label for="" class="label">
                        <span class="label-text">NIS</span>
                    </label>
                    <input type="text" class="input input-bordered" wire:model="nis">
                </div>
            </div>
        </div>
        <div class="card bg-base-100 shadow">
            <div class="card-body">
                <div class="form-control">
                    <label for="" class="label">
                        <span class="label-text">Username login</span>
                    </label>
                    <input type="text" class="input input-bordered" wire:model="username">
                </div>
                <div class="form-control">
                    <label for="" class="label">
                        <span class="label-text">Password login</span>
                    </label>
                    <input type="text" class="input input-bordered" wire:model="password">
                    <label for="" class="label">
                        <span class="label-text-alt opacity-70">Isi apabila ingin ubah password</span>
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div>
        <button class="btn btn-primary" wire:click="simpan">
            <x-tabler-check class="w-5 h-5" />
            <span>simpan</span>
        </button>
    </div>
</div>