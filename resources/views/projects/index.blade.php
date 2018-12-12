@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>projects</h1>
        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <ul class="list-group">
                    @foreach($projects as $project)
                    <li class="list-group-item">
                        <a href="/projects/{{ $project->id }}">
                            {{ $project->name }} 
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-xs-12 col-sm-3">
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="{{ route('projects.create') }}">
                            Create project
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

@endsection