@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create project</h1>
        <div class="row">
            <div class="col-xs-12 col-sm-9">
                <form method="POST" action="{{ route('projects.store') }}">
                    {{ csrf_field() }}

                    <input type="hidden" name="company_id" value="{{ $company_id }}"/>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" placeholder="enter name" />
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea rows="3" type="text" name="description" class="form-control" placeholder="enter description"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <div class="col-xs-12 col-sm-3">
                <ul class="list-group" style="padding-top:30px;">
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