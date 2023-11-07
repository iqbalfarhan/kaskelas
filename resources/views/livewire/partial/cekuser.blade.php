<div>
    <input type="checkbox" id="modalcekuser" class="modal-toggle" wire:model.live="show" />
    <div class="modal">
        <div class="modal-box text-center">
            <h3 class="font-bold text-lg">Hai pengguna baru.</h3>
            <p class="py-4">Akun anda belum di verifikasi. silakan hubungi admin untuk verifikasi pendaftaran.</p>

            <div class="modal-actions">
                <button class="btn btn-neutral" wire:click="$dispatch('logout')">
                    <x-tabler-logout class="w-5 h-5" />
                    <span>Logout</span>
                </button>
            </div>
        </div>
    </div>
</div>
