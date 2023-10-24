<ul class="menu p-4 w-80 min-h-full bg-base-100 text-base-content space-y-4">
    <li>
        <h2 class="menu-title">Halaman utama</h2>
        <ul>
            <li>
                <a href="{{ route('home') }}" class="{{ $this->isActive('home') }}" wire:navigate>
                    <span>Dashboard</span>
                </a>
            </li>
        </ul>
    </li>

    <li>
        <h2 class="menu-title">Transaksi</h2>
        <ul>
            <li>
                <a href="{{ route('transaksi.masuk') }}" class="{{ $this->isActive('transaksi.masuk') }}" wire:navigate>
                    <span>Pemasukan</span>
                </a>
            </li>
            <li>
                <a href="{{ route('transaksi.keluar') }}" class="{{ $this->isActive('transaksi.keluar') }}" wire:navigate>
                    <span>Pengeluaran</span>
                </a>
            </li>
        </ul>
    </li>
    
   <li>
        <h2 class="menu-title">Lainnya</h2>
        <ul>
            <li>
                <a href="{{ route('profile') }}">
                    <span>Edit prorfile</span>
                </a>
            </li>
            <li>
                <button wire:click="logout">
                    <span>Logout</span>
                </button>
            </li>
        </ul>
   </li>
</ul>