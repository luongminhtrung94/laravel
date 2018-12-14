@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>project Detail</h1>
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-sm-offset-3">
                <ul class="list-group">
                    <li class="list-group-item">
                        ID: {{ $project->id }}
                    </li>
                    <li class="list-group-item">
                        Name: {{ $project->name }}
                    </li>
                    <li class="list-group-item">
                        Description: {{ $project->description }}
                    </li>
                </ul>
                @include ('partials.comments')
            </div>
            <div class="col-xs-12 col-sm-3">
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="/projects/{{ $project->id }}/edit">Edit</a>
                    </li>
                    <li class="list-group-item">
                        <a href="#" onClick="confirmDelete(event)">Delete</a>
                        <script>
                            function confirmDelete(e){
                                var result = confirm("Are you sure you wish to delete this project?");
                                if(result){
                                    e.preventDefault();
                                    document.getElementById('delete-form').submit();
                                }
                            }
                        </script>
                        
                        <form id="delete-form" method="POST" action="{{ route('projects.destroy' , [$project->id]) }}" style="display:none">
                            <input type="hidden" name="_method" value="delete"/>
                            {{ csrf_field() }}
                        </form>
                    </li>
                    <li class="list-group-item">
                        Add new member
                    </li>
                    <li class="list-group-item">
                        <a href="{{ URL::previous() }}">Go back</a>
                    </li>
                </ul>
                <form method="POST" action="{{ route('projects.adduser') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="project_id" value="{{$project->id}}"/>

                    <div class="form-group">
                        <label>Add new member</label>
                        <div class="input-group">
                            <input type="text" name="email" class="form-control"/>
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-primary ">Add</button>
                            </span>
                        </div>
                    </div>
                </form>
                
                <ul class="list-group">
                    @foreach($project->users as $user)
                    <li class="list-group-item">
                        <a href="/projects/{{ $project->id }}/edit">{{$user->email}}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-xs-12 col-sm-3">
                <!-- <ul class="list-group">
                    <li class="list-group-item">
                        <a href="{{ route('projects.index') }}">
                            All projects
                        </a>
                    </li>
                </ul> -->
                <h1>new comment</h1>
                <form method="POST" action="{{ route('comments.store') }}">
                    {{ csrf_field() }}

                    <input type="hidden" name="commentable_type" value="Project"/>
                    <input type="hidden" name="commentable_id" value="{{ $project->id }}"/>

                    <div class="form-group">
                        <label>Url (proof of work done)</label>
                        <input type="text" name="url" class="form-control" placeholder="enter url" />
                    </div>
                    <div class="form-group">
                        <label>Comments</label>
                        <textarea rows="3" type="text" name="body" class="form-control" placeholder="enter body"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection