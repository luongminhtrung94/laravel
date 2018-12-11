@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Company</h1>
        <div class="row">
            <div class="col-xs-12 col-sm-9">
                <form method="POST" action="{{ route('companies.update' , [$company->id]) }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PUT"/>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $company->name }}" placeholder="enter name" />
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea rows="3" type="text" name="description" class="form-control" placeholder="enter description">{{ $company->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <div class="col-xs-12 col-sm-3">
                <ul class="list-group" style="padding-top:30px;">
                    <li class="list-group-item">
                        <a href="{{route('companies.show' , $company->id) }}">View this Company</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{ route('companies.index') }}">
                            All Companies
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection