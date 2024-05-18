<div>
    <x-header-component></x-header-component>
    <section class="second py-5">
        <div class="container">
            <h4 class="text-light">Create New Project</h4>

            @if ($errors->any())
                @foreach ($errors->all() as $err)
                    <p class="alert alert-danger">{{ $err }}</p>
                @endforeach
            @endif

            <form wire:submit="createProject()" method="post">
                <div class="form-group">
                    <label for="" class="text-light">Project Name</label>
                    <input type="text" wire:model="name" class="form-control" placeholder="Project Name">
                </div>
                <div class="form-group">
                    <label for="" class="text-light">Project Description</label>
                    <textarea wire:model="description" id="" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-light">Create</button>
                </div>
            </form>
        </div>
    </section>
</div>
