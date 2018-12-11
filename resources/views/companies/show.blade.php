@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Company Detail</h1>
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-sm-offset-3">
                <ul class="list-group">
                    <li class="list-group-item">
                        ID: {{ $company->id }}
                    </li>
                    <li class="list-group-item">
                        Name: {{ $company->name }}
                    </li>
                    <li class="list-group-item">
                        Description: {{ $company->description }}
                    </li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-3">
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="/companies/{{ $company->id }}/edit">Edit</a>
                    </li>
                    <li class="list-group-item">
                        Delete
                    </li>
                    <li class="list-group-item">
                        Add new member
                    </li>
                </ul>
            </div>

            <div class="col-xs-12 col-sm-3">
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="{{ route('companies.index') }}">
                            All Companies
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <h1>List Projects</h1>
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-sm-offset-3">
                <ul class="list-group">
                    @foreach($company->projects as $project)
                        <li class="list-group-item">
                            <a href="/projects/{{ $project->id }}">
                                Name: {{ $project->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

@endsection