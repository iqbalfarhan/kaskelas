<div>
    @if ($transaksi->tipe == "masuk")
        @livewire('transaksi.edit-masuk', ['transaksi' => $transaksi])
    @elseif ($transaksi->tipe == "keluar")
        @livewire('transaksi.edit-keluar', ['transaksi' => $transaksi])
    @endif
</div>
