<div class="space-y-6">
    <div class="flex justify-between items-center">
        @livewire('partial.header', [
            'title' => 'Data kelas',
            'desc' => 'tambah, edit'
        ])
    </div>

    <div class="grid gap-4">
        @foreach ($datas as $data)
            @livewire('kelas.item', ['kelas' => $data], key($data->id))
        @endforeach
    </div>
</div>