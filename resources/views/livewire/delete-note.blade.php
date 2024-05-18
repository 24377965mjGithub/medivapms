<div>
    <x-header-component></x-header-component>
    <section class="second py-5">
        <div class="container">
            <h4 class="text-light">Are you sure you want to delete this note?</h4>

            <div class="card mb-2">
                <div class="card-body">
                    <p>
                        {{ $noteObj->note }}
                    </p>
                </div>
            </div>

            <button wire:click="deleteNote()" class="btn btn-danger">Continue</button>
        </div>
    </section>
</div>
