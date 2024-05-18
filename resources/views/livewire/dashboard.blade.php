<div>
    <x-header-component></x-header-component>
    <section class="second1 py-5">
        <div class="container">
            <h1 class="text-light">Hello! {{ Auth::user()->name }}</h1>
        </div>
    </section>
    <section class="first pb-4">
        <div class="container">
            <a href="{{ route('add-project') }}"><button class="btn btn-light">Create Project</button></a>
        </div>
    </section>
    <section class="second2">
        <div class="container">
            <b class="text-light">Search Project</b>
            <input type="text" wire:model.live="search" id="" class="form-control" placeholder="Search Project...">

            @if ($search != "")
                <div class="card">
                    <div class="card-body">
                        @foreach ($projectSearchResult as $result)
                            <a href="{{ route('view-project', ['projectid' => $result->id]) }}" style="text-decoration: none;">{{ $result->name }}</a> <br>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>
    <section class="second py-3">
        <div class="container">
            <h4 class="text-light">Project List</h4>
        </div>
    </section>
    <section class="third">
        <div class="container">
            <div class="row">

                @forelse ($projects as $project)
                    <div class="col-lg-4 col-md-4 col-sm-12 py-3">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{ $project->name }}</h4>
                                <hr>
                                <p class="card-description">
                                    <b>Description: </b>{{ $project->description }} <br>
                                    <hr>
                                    <b>Created by: </b> {{ $user::where('id', $project->userid)->value('name') }} <br>
                                    <b>Created on: </b> {{ $project->created_at->format('F j, Y') }} {{ $project->created_at->diffForHumans() }} <br>
                                    @if ($deadline::where('projectid', $project->id)->count() === 0)
                                        <b>Deadline:</b> (not set)<br>
                                    @else
                                        <b>Deadline:</b> {{ Carbon\Carbon::parse($deadline::where('projectid', $project->id)->value('deadline'))->format('F j. Y g:i A') }} ({{ Carbon\Carbon::parse($deadline::where('projectid', $project->id)->value('deadline'))->diffForHumans() }})<br>
                                    @endif
                                </p>
                                <a href="{{ route('view-project', ['projectid' => $project->id]) }}"><button class="btn btn-dark">View Project</button></a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">No Projects</h4>
                            </div>
                        </div>
                    </div>
                @endforelse


            </div>
        </div>
    </section>
</div>
