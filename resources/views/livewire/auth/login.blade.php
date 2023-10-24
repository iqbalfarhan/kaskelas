<div class="card bg-base-100 shadow w-full max-w-sm mx-auto">
    <form class="card-body" wire:submit.prevent="login">
        <div class="space-y-4 py-4">
            <div class="form-control">
                <label for="" class="label">
                    <span class="label-text">Username</span>
                </label>
                <input type="text" class="input @error('usename') input-error @enderror" wire:model="username" placeholder="Username">
            </div>
            <div class="form-control">
                <label for="" class="label">
                    <span class="label-text">Password</span>
                </label>
                <input type="password" class="input @error('password') input-error @enderror" wire:model="password" placeholder="Password">
            </div>
        </div>
        <div class="card-actions">
            <button class="btn btn-primary">Login</button>
        </div>
    </form>
</div>
