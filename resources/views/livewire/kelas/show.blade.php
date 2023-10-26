<div class="space-y-6">
    <div class="flex justify-between items-center">
        @livewire('partial.header', [
            'title' => 'Edit data kelas',
            'desc' => 'Nama kelas, walikelas, telegram group'
        ])
    </div>

    <form class="mx-auto w-full max-w-lg space-y-6" wire:submit.prevent="simpan">
        <div class="card bg-base-100">
            <div class="card-body">
                <div class="space-y-4">
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
            </div>
        </div>
        <div>
            <button class="btn btn-primary">
                <x-tabler-check class="w-5 h-5" />
                <span>simpan</span>
            </button>
        </div>
    </form>

</div>