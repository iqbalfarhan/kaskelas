<div class="space-y-6">
    <div class="flex justify-between items-center">
        @livewire('partial.header', [
            'title' => 'Pengaturan bot telegram',
            'desc' => 'Reset bot telegram'
        ])
    </div>

    <div class="">
        <div class="card bg-base-100 shadow w-full max-w-md mx-auto">
            <div class="card-body space-y-6">
                <h3 class="card-title">Reset bot telegram</h3>
                <p>
                    Terkadang bot telegram bisa tidak merespon. apabila bot tidak merespon harap reset bot pending command telegram dengan klik pada reset bot telegram dibawah ini.
                </p>
                <div class="card-actions">
                    <button class="btn btn-primary" wire:click="resetbottelegram" wire:confirm="Yakin akan reset pending telegram">
                        <span wire:loading>
                            <span class="loading loading-xs"></span>
                        </span>
                        <span>Reset bot telegram</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>