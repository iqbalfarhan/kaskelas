<ul class="menu p-4 w-80 min-h-full bg-base-100 text-base-content space-y-4">
    <li>
        <img src="{{ url('YouFi.png') }}" alt="" class="w-20 self-center">
    </li>
    <li>
        <h2 class="menu-title">Halaman utama</h2>
        <ul>
            <li>
                <a href="{{ route('home') }}" class="{{ $this->isActive('home') }}" wire:navigate>
                    <x-tabler-dashboard class="h-4 w-4" />
                    <span>Dashboard</span>
                </a>
            </li>
            @can('user.index')
                <li>
                    <a href="{{ route('sekolah.index') }}" class="{{ $this->isActive(['sekolah.index', 'sekolah.show']) }}" wire:navigate>
                        <x-tabler-building class="h-4 w-4" />
                        <span>Data sekolah</span>
                    </a>
                </li>
            @endcan
            @can('kelas.index')
                <li>
                    <a href="{{ route('kelas.index') }}" class="{{ $this->isActive(['kelas.index', 'kelas.show']) }}" wire:navigate>
                        <x-tabler-door class="h-4 w-4" />
                        <span>Data kelas</span>
                    </a>
                </li>
            @endcan
            @can('user.index')
                <li>
                    <a href="{{ route('user.index') }}" class="{{ $this->isActive(['user.index', 'user.show']) }}" wire:navigate>
                        <x-tabler-users class="h-4 w-4" />
                        <span>Data siswa</span>
                    </a>
                </li>
            @endcan
        </ul>
    </li>

    <li>
        <h2 class="menu-title">Transaksi</h2>
        <ul>
            @can('transaksi.index')
                <li>
                <a href="{{ route('transaksi.index') }}" class="{{ $this->isActive(['transaksi.index', 'transaksi.edit']) }}" wire:navigate>
                    <x-tabler-list class="h-4 w-4" />
                    <span>Riwayat kas</span>
                </a>
            </li>
            @endcan
            @can('transaksi.masuk')
                <li>
                <a href="{{ route('transaksi.masuk') }}" class="{{ $this->isActive('transaksi.masuk') }}" wire:navigate>
                    <x-tabler-circle-plus class="h-4 w-4" />
                    <span>Pemasukan kas</span>
                </a>
            </li>
            @endcan
            @can('transaksi.keluar')
            <li>
                <a href="{{ route('transaksi.keluar') }}" class="{{ $this->isActive('transaksi.keluar') }}" wire:navigate>
                    <x-tabler-circle-minus class="h-4 w-4" />
                    <span>Pengeluaran kas</span>
                </a>
            </li>
            @endcan
        </ul>
    </li>
    
   <li>
        <h2 class="menu-title">Lainnya</h2>
        <ul>
            @can('pengaturan.telegram')
                <li>
                    <a href="{{ route('pengaturan.telegram') }}" class="{{ $this->isActive('pengaturan.telegram') }}" wire:navigate>
                        <x-tabler-brand-telegram class="h-4 w-4" />
                        <span>Bot telegram</span>
                    </a>
                </li>
            @endcan
            @can('database.index')
                <li>
                    <a href="/adminer" target="_blank">
                        <x-tabler-database class="h-4 w-4" />
                        <span>DB Management</span>
                    </a>
                </li>
            @endcan
            @can('permission.index')
                <li>
                    <a href="{{ route('permission.index') }}" class="{{ $this->isActive('permission.index') }}" wire:navigate>
                        <x-tabler-key class="h-4 w-4" />
                        <span>App Permission</span>
                    </a>
                </li>
            @endcan
            <li>
                <a href="{{ route('profile') }}" class="{{ $this->isActive('profile') }}" wire:navigate>
                    <x-tabler-id class="h-4 w-4" />
                    <span>Edit profile</span>
                </a>
            </li>
            <li>
                <button wire:click="logout">
                    <x-tabler-logout class="h-4 w-4" />
                    <span>Logout</span>
                </button>
            </li>
        </ul>
   </li>
</ul>