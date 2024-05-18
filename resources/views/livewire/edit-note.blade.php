<div>
    <x-header-component></x-header-component>
    <section class="second py-5">
        <div class="container">
            <h4 class="text-light">Edit Note</h4>

            @if ($errors->any())
                @foreach ($errors->all() as $err)
                    <p class="alert alert-danger">{{ $err }}</p>
                @endforeach
            @endif

            <form wire:submit="updateNote()" method="post">
                <div class="form-group">
                    <label for="" class="text-light">Note</label>
                    <textarea wire:model="note" id="" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-light">Update Note</button>
                </div>
            </form>
        </div>
    </section>
</div>
