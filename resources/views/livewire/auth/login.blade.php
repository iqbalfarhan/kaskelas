<div class="card bg-base-100 shadow w-full max-w-md mx-auto">
    <form class="card-body lg:p-14" wire:submit.prevent="login">
        <img src="{{ url('YouFi.png') }}" alt="" class="w-48 mx-auto my-10">
        <div class="space-y-6 py-4">
            <div class="space-y-2">
                <input type="text" class="input input-bordered w-full @error('username') input-error @enderror" wire:model="username" placeholder="Username" />
                <input type="password" class="input input-bordered w-full @error('password') input-error @enderror" wire:model="password" placeholder="Password" />
                <div class="form-control">
                    <label class="label cursor-pointer">
                        <span class="label-text">Remember me</span> 
                        <input type="checkbox" checked="checked" class="checkbox" />
                    </label>
                </div>
            </div>
        </div>
        <div class="card-actions">
            <button class="btn btn-primary btn-block">
                <span wire:loading>
                    <span class="loading loading-sm"></span>
                </span>
                <span>Login</span>
            </button>
        </div>
        <div class="text-center py-4">
            <a href="{{ route('register') }}" class="text-xs">Daftar disini</a>
        </div>
    </form>
</div>
