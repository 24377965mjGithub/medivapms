<div>
    <x-header-component></x-header-component>
    <section class="second py-5">
        <div class="container">
            <h4 class="text-light">Set Deadline to {{ $projectObj->name }}</h4>

            @if ($errors->any())
                @foreach ($errors->all() as $err)
                    <p class="alert alert-danger">{{ $err }}</p>
                @endforeach
            @endif

            <form wire:submit="setDeadline()" method="post">
                <div class="form-group">
                    <label for="" class="text-light">Date</label>
                    <input type="date" wire:model="date" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="" class="text-light">Time</label>
                    <input type="time" wire:model="time" id="" class="form-control">
                </div>
                <div class="form-group">
                    <button class="btn btn-light">Set/Update Deadline</button>
                </div>
            </form>
        </div>
    </section>
</div>
