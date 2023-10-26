<div class="space-y-6">
    <div class="flex justify-between items-center">
        @livewire('partial.header', [
            'title' => 'Data kelas',
            'desc' => 'tambah, edit'
        ])

        <div class="">
            <button class="btn">
                <x-tabler-plus class="w-5 h-5" />
                <span>create kelas</span>
            </button>
        </div>
    </div>

    <div class="grid lg:grid-cols-3 gap-6">
        @foreach ($datas as $data)
            @livewire('kelas.item', ['kelas' => $data], key($data->id))
        @endforeach
    </div>
</div>