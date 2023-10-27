<div>
    <input type="checkbox" id="detailTransaksi" class="modal-toggle" wire:model.live="show" />
    <div class="modal">
        <div class="modal-box">
            <h3 class="font-bold text-lg">Detail transaksi</h3>
            <div class="py-4">
                @if ($transaksi)
                    <div class="avatar">
                        <div class="w-full rounded">
                            <img src="{{ $transaksi->image_url }}" />
                        </div>
                    </div>
                @endif
            </div>
            <div class="modal-action">
                <label for="detailTransaksi" class="btn">Close!</label>
            </div>
        </div>
    </div>
</div>
