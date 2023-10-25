<div class="card bg-base-100 shadow w-full max-w-sm mx-auto">
    <form class="card-body" wire:submit.prevent="login">
        <div class="space-y-6 py-4">
            <img src="{{ url('YouFi.png') }}" alt="" class="w-52 mx-auto">
            <div class="space-y-4">
                <input type="text" class="input w-full @error('username') input-error @enderror" wire:model="username" placeholder="Username" />
                <input type="password" class="input w-full @error('password') input-error @enderror" wire:model="password" placeholder="Password" />
            </div>
        </div>
        <div class="card-actions">
            <button class="btn btn-primary">
                <span wire:loading>
                    <span class="loading loading-sm"></span>
                </span>
                <span>Login</span>
            </button>
        </div>
    </form>
</div>
