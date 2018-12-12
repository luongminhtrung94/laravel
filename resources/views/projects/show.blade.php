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
                </ul>
            </div>

            <div class="col-xs-12 col-sm-3">
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="{{ route('projects.index') }}">
                            All projects
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

@endsection