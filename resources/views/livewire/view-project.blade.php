<div>
    <x-header-component></x-header-component>
    <section class="second py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <h4 class="text-light">{{ $project->name }}</h4>

                    <hr class="text-light">

                    <p class="text-light">
                        <b>Description:</b>
                        {{ $project->description }}
                    </p>
                    <p class="text-light">
                        <b>Created By:</b> {{ $user::where('id', $project->userid)->value('name') }} <br>
                        <b>Created On:</b> {{ $project->created_at->format('F j. Y') }} ({{ $project->created_at->diffForHumans() }})<br>
                        @if ($deadline::where('projectid', $project->id)->count() === 0)
                            <b>Deadline:</b> (not set)<br>
                        @else
                            <b>Deadline:</b> {{ Carbon\Carbon::parse($deadline::where('projectid', $project->id)->value('deadline'))->format('F j. Y g:i A') }} ({{ Carbon\Carbon::parse($deadline::where('projectid', $project->id)->value('deadline'))->diffForHumans() }})<br>
                        @endif
                    </p>

                    <hr class="text-light">

                    <a wire:navigate href="{{ route('dashboard') }}"><button class="btn btn-success m-2">Back to Dashboard</button></a>
                    <a wire:navigate href="{{ route('edit-project', ['projectid' => $project->id]) }}"><button class="btn btn-info m-2">Edit Project</button></a>
                    <a wire:navigate href="{{ route('delete-project', ['projectid' => $project->id]) }}"><button class="btn btn-danger m-2">Delete Project</button></a>
                    <a wire:navigate href="{{ route('set-deadline', ['projectid' => $project->id]) }}"><button class="btn btn-warning m-2">Set/Update Deadline</button></a>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Notes</h4>
                            <form wire:submit="addNote()" method="post">
                                @if ($errors->any())
                                    @foreach ($errors->all() as $err)
                                        <p class="alert alert-danger">{{ $err }}</p>
                                    @endforeach
                                @endif
                                <div class="form-group">
                                    <textarea wire:model="note" id="" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-light">Add</button>
                                </div>
                            </form>

                            @forelse ($allNotes as $allNote)
                                <p>
                                    {{ OsiemSiedem\Autolink\Facades\Autolink::convert($allNote->note) }} - {{ $allNote->created_at->diffForHumans() }}
                                </p>

                                <a wire:navigate href="{{ route('edit-note', ['noteid' => $allNote->id]) }}"><button class="btn btn-light text-info">Edit</button></a>
                                <a wire:navigate href="{{ route('delete-note', ['noteid' => $allNote->id]) }}"><button class="btn btn-light text-danger">Delete</button></a>

                                <hr>
                            @empty
                                <p>
                                    No notes...
                                </p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
