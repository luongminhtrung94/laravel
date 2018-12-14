@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create project</h1>
        <div class="row">
            <div class="col-xs-12 col-sm-9">
                <form method="POST" action="{{ route('projects.store') }}">
                    {{ csrf_field() }}

                    @if($company_id)
                    <input type="hidden" name="company_id" value="{{ $company_id }}"/>
                    @endif
                    
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" placeholder="enter name" />
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea rows="3" type="text" name="description" class="form-control" placeholder="enter description"></textarea>
                    </div>

                    @if($companies != null)
                    <div class="form-group">
                        <label>Select Company</label>
                        <select name="company_id" class="form-control">
                        @foreach($companies as $company)
                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                        @endforeach
                        </select>
                    </div>
                    @endif
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