<div class="space-y-6">
    <div class="flex justify-between items-center gap-6">
        @livewire('partial.header', [
            'title' => 'Data sekolah',
            'desc' => 'Akses fitur'
        ])

        <div>
            <label for="createModal" class="btn">
                <x-tabler-plus class="w-5 h-5" />
                <span class="hidden lg:block">create sekolah</span>
            </label>
        </div>
    </div>

    <div>
        <input type="text" class="input" placeholder="Cari sekolah" wire:model.live="cari">
    </div>

    <div class="overflow-x-auto bg-base-100 shadow rounded-lg">
        <table class="table whitespace-nowrap">
            <thead class="border-b-4 border-base-200">
                <th>ID</th>
                <th>Nama sekolah</th>
                <th>logo</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr>
                        <td>{{ $data->id }}</td>
                        <td>
                            <div class="flex flex-col">
                                <span>{{ $data->name }}</span>
                                <span class="text-xs">{{ $data->address }}</span>
                            </div>
                        </td>
                        <td>
                            <div class="avatar">
                                <div class="w-12 rounded-lg">
                                    <img src="{{ $data->logo_url }}" alt="{{ $data->logo_url }}">
                                </div>
                            </div>
                        </td>
                        <td>
                            @can('sekolah.edit')
                                <button class="btn btn-xs btn-success btn-square">
                                    <x-tabler-edit class="w-4 h-4" />
                                </button>
                            @endcan
                            @can('sekolah.delete')
                                <button class="btn btn-xs btn-error btn-square" wire:click="deleteSekolah({{ $data->id }})" wire:confirm="Delete sekolah">
                                    <x-tabler-trash class="w-4 h-4" />
                                </button>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @livewire('sekolah.create')
</div>
